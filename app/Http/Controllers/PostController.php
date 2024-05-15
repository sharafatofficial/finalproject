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
    
    return redirect()->route('post_list')->with('status','Post Added Successfully');
   }

   function view(){
    $posts=AddPost::all();
    
    return view('backend.post_view',compact("posts"));
    
   }

   function delete($id){
      AddPost::find($id)->delete();

      return redirect()->back()->with('status','Post Deleted Successfully');;
    }

    function edit($id){

       $post=AddPost::find($id)->first();
       return view('backend.post_add',compact('post'));
    }

    function update(Request $request ,$id){

       $table=AddPost::find($id);
       $table->title=$request->title;
       $table->category=$request->category;
       $table->tag=$request->tag;
       $table->tranding=$request->tranding;
       $table->description=$request->description;
       $imageName = time().'.'.request()->thumbnail->getClientOriginalExtension();
       request()->thumbnail->move(public_path('images'), $imageName);
       $table->thumbnail=$imageName;
       $table->update();
       
       return redirect()->route('post_list')->with('status','Post Updated Successfully');
    }
}
