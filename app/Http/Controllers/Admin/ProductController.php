<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    function index()
    {   
        $products =Product::all();
        return view('admin.products.index',compact('products'));
    }

    function add()
    {
        $category = Category::all();
        return view('admin.products.add',compact('category'));
    }

    function insert(Request $request)
    {
        $products = new Product();
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/products',$filename);
            $products->image = $filename;
        }

        $products->cate_id = $request->cate_id;
        $products->name = $request->name;
        $products->slug = $request->slug;
        $products->small_description = $request->small_description;
        $products->description = $request->description;
        $products->original_price = $request->original_price;
        $products->selling_price = $request->selling_price;
        $products->tax = $request->tax;
        $products->quantity = $request->quantity;
        $products->status = $request->status == TRUE ? '1' : '0' ;
        $products->trending = $request->trending == TRUE ? '1' : '0';
        $products->meta_title = $request->meta_title;
        $products->meta_keywords = $request->meta_keywords;
        $products->meta_description = $request->meta_description;
        $products->save();

        return redirect('products')->with('status', "Product Added Successfully");
    }

    function edit($id)
    {
        $products = Product::find($id);
        return view('admin.products.edit',compact('products'));
    }

    function update(Request $request, $id)
    {
        $products = Product::find($id);

         if($request->hasfile('image'))
        {

            $path = 'assets/uploads/products/'.$products->image;
            if(File::exists($path))
            {
                File::delete($path);
            }

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/products',$filename);
            $products->image = $filename;
        }

        $products->name = $request->name;
        $products->slug = $request->slug;
        $products->small_description = $request->small_description;
        $products->description = $request->description;
        $products->original_price = $request->original_price;
        $products->selling_price = $request->selling_price;
        $products->tax = $request->tax;
        $products->quantity = $request->quantity;
        $products->status = $request->status == TRUE ? '1' : '0' ;
        $products->trending = $request->trending == TRUE ? '1' : '0';
        $products->meta_title = $request->meta_title;
        $products->meta_keywords = $request->meta_keywords;
        $products->meta_description = $request->meta_description;
        $products->update();

        return redirect('products')->with('status',"Product updated successfully");
    }


    function destroy($id)
    {
        $products = Product::find($id);
        $path='assets/uploads/products/'.$products->image;
        if(File::exists($path))
            {
                File::delete($path);
            }
            $products->delete();
            return redirect('products')->with('status',"Products deleted Successfully");
    }
}
