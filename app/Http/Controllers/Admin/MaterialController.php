<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Material;


class MaterialController extends Controller
{
    function index()
    {   
        $materials =Material::all();
        return view('admin.materials.index',compact('materials'));
    }

    function add()
    {
        $category = Category::all();
        return view('admin.materials.add',compact('category'));
    }

    function insert(Request $request)
    {
        $materials = new Material();
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/materials',$filename);
            $materials->image = $filename;
        }

        $materials->cate_id = $request->cate_id;
        $materials->name = $request->name;
        $materials->slug = $request->slug;
        $materials->small_description = $request->small_description;
        $materials->description = $request->description;
        $materials->original_price = $request->original_price;
        $materials->selling_price = $request->selling_price;
        $materials->tax = $request->tax;
        $materials->qty = $request->qty;
        $materials->status = $request->status == TRUE ? '1' : '0' ;
        $materials->trending = $request->trending == TRUE ? '1' : '0';
        $materials->meta_title = $request->meta_title;
        $materials->meta_keywords = $request->meta_keywords;
        $materials->meta_description = $request->meta_description;
        $materials->save();

        return redirect('materials')->with('status', "Material` Added Successfully");
    }
}
