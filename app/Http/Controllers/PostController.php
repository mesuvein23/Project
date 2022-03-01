<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Controllers\Controller;
class PostController extends Controller
{

    /*public function __construct()
    {
        $this->middleware('auth');
    }
    */

    function index()
    {
       $posts= Post::all();
       return view('posts.index',compact('posts'));

    }//return view('product',['products'=>$data]);

    function create()
    {
        return view('posts.create');
    }

    function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'image' =>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();

        if($image=$request->file('image')){
           $destinationPath='image/';
           $profileImage= date('YmdHis') . "." . $image->getClientOriginalExtension ();
           $image->move($destinationPath, $profileImage);
           $input['image'] = "$profileImage";
        }

        //Post::create($request->input());
        Post::create($input);

        return redirect()->route('posts.index')->with('success','Post Created Successfully.');
    }

    function show(Post $post)
    {
        return view('posts.show',compact('post'));
    }


    function edit(Post $post)
    {
        return view('posts.edit',compact('post'));
    }

    function update(Request $request,Post $post)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required'
            ]);

        $input = $request->all();

        if($image=$request->file('image'))
        {
           $destinationPath='image/';
           $profileImage=date('YmdHis') .".". $image->getClientOriginalExtension();
           $image->move($destinationPath, $profileImage);
           $input['image'] = "$profileImage";
        }

        else
        {
            unset($input['image']);
        }

        $post->update($input);
        return redirect()->route('posts.index')->with('success','Posts Updated Successfully');
    }

    function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')->with('success','Posts deleted Successfully');
    }
}
