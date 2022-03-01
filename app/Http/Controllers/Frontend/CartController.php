<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    function addProduct(Request $request)
    {
        $product_id = $request->input('product_id');
        $product_quantity = $request->input('product_quantity');

        if(Auth::check())
        {
            $prod_check = Product::where('id',$product_id)->first();
            
            if($prod_check)
            {
                if(Cart::where('prod_id',$product_id)->where('user_id',Auth::id())->exists())
                {
                    return response()->json(['status' => $prod_check->name."Already added to cart"]);
                }
                else
                {
                    $cartItem = new Cart();
                    $cartItem->prod_id = $product_id;
                    $cartItem->user_id = Auth::id();
                    $cartItem->prod_quantity= $product_quantity;
                    $cartItem->save();
                    return response()->json(['status' => $prod_check->name."Added to Cart succesfully"]);    
                }
                
            }
        }
        else
        {
         return response()->json(['status' => "Please login to continue"]);   
        }
    }

    function viewcart()
    {
        $cartitems = Cart::where('user_id',Auth::id())->get();
        return view('frontend.products.cart',compact('cartitems'));
    }

    function updateCart(Request $request)
    {
        $prod_id = $request->input('prod_id');
        $product_quantity = $request->input('prod_quantity');
        
        if(Auth::check())
        {
            if(Cart::where('prod_id',$prod_id)->where ('user_id',Auth::id())->exists())
            {
                $cart = Cart::where('prod_id', $prod_id)->where('user_id',Auth::id())->first();
                $cart->prod_quantity=$product_quantity;
                $cart->update();
                return response()->json(['status' => "Product Updated successfully"]);

            }
        }
    }

    function deleteCartitem(Request $request)
    {
        if(Auth::check())
        {
            $prod_id = $request->input ('prod_id');
            if(Cart::where('prod_id',$prod_id)->where ('user_id',Auth::id())->exists())
            {
                $cartItems = Cart::where('prod_id',$prod_id)->where('user_id',Auth::id())->first();
                $cartItems->delete();
                return response()->json(['status'=>"Products deleted sucessfullya"]);
            }
        }
        else
        {
            return response()->json(['status' => "Login to continue"]);
        }

    }
}
