<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class CheckoutController extends Controller
{
    function index()
    {
        $old_cartitems = Cart::where('user_id',Auth::id())->get();
        foreach($old_cartitems as $item)
        {
            if(!Product::where('id',$item->prod_id)->where('quantity','>=',$item->prod_quantity)->exists())
            {
                $removeItem = Cart::where('user_id',Auth::id())->where('prod_id',$item->prod_id)->first();
                $removeItem->delete();
            }
        }

        $cartitems = Cart::where('user_id', Auth::id())->get();

        return view('frontend.checkout',compact('cartitems'));
    }

    function placeorder(Request $request)
    {
        $order = new Order();
        $order->user_id = Auth::id();
        $order->fullname = $request->input('fullname');
        $order->email = $request->input('email');
        $order->phonenumber = $request->input('phonenumber');
        $order->address = $request->input('address');
        $order->city = $request->input('city');
        $order->region = $request->input('region');
        $total=0;
        $cartitems_total= Cart::where('user_id',Auth::id())->get();
        
        foreach($cartitems_total as $prod)
        {
            $total += $prod->products->selling_price;
        }
        $order->total_price = $total;
        $order->tracking_no = 'order'.rand(1111,9999);
        $order->save();

        $cartitems = Cart::where('user_id', Auth::id())->get();
        foreach($cartitems as $item)
        {
            OrderItem::create([
                'order_id' => $order->id,
                'prod_id' =>$item->prod_id,
                'quantity' => $item->prod_quantity,
                'price' => $item->products->selling_price,
            ]);  

            $prod = Product::where('id',$item->prod_id)->first();
            $prod->quantity = $prod->quantity - $item->prod_quantity;
            $prod->update();
        }

        if(Auth::user()->address == NULL)
        {
            $user =User::where('id',Auth::id())->first();
            $user->name = $request->input('fullname');
            $user->number = $request->input('phonenumber');
            $user->address = $request->input('address');
            $user->city = $request->input('city');
            $user->region = $request->input('region');
            $user->update();
        }

        $cartitems = Cart::where('user_id',Auth::id())->get();
        Cart::destroy($cartitems);
        return redirect('/')->with('status', "Order placed successfully");
    }
}
