<?php

namespace App\Http\Controllers;

use App\Models\AddPost;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
   function store(Request $request){
    $add_post= new AddPost;
    $add_post->title=$request->title;
    $add_post->category=$request->category;
    $add_post->tag=$request->tag;
    $add_post->tranding=$request->tranding;
    $add_post->description=$request->description;
    $imageName = time().'.'.request()->thumbnail->getClientOriginalExtension();
    request()->thumbnail->move(public_path('images'), $imageName);
    $add_post->thumbnail=$imageName;
    $add_post->save();
    
    return redirect()->back();
   }

   function view(){
    $posts=AddPost::all();
    
    return view('backend.post_view',compact("posts"));
    
   }

   function store_cat(Request $request){
      // dd($request->all());
     $category=new Category;
     $category->name=$request->name;
     $category->save();

   }
   function view_cat(){
      $category=Category::all();

      return view('backend.category.category_view',compact('category'));
   }
}
