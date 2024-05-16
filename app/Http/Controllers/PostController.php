<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\AddPost;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{

   function add_post(){
      $categories=Category::all();
      $tags=Tag::all();
      return view('backend.post_add',compact('categories','tags'));
  }

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
    
    return redirect()->route('post_list')->with('status','Post Added Successfully')->with('expire', 5);
   }

   function view(){
    $posts=AddPost::all();
   // foreach($posts as $post){
   //   echo  $post->show_category->name .'<br>';
   // }
     return view('backend.post_view',compact("posts"));
    
   }

   function delete($id){
      AddPost::find($id)->delete();

      return redirect()->back()->with('status','Post Deleted Successfully')->with('expire', 5);
    }

    function edit($id){

       $post=AddPost::where('id',$id)->first();
       $categories=Category::all();
      $tags=Tag::all();
       return view('backend.post_add',compact('post','categories','tags'));
    }

    function update(Request $request ,$id){

       $table=AddPost::find($id);
       $table->title=$request->title;
       $table->category=$request->category;
       $table->tag=$request->tag;
       $table->tranding=$request->tranding;
       $table->description=$request->description;
       if(isset(request()->thumbnail)){
         $imageName = time().'.'.request()->thumbnail->getClientOriginalExtension();
         request()->thumbnail->move(public_path('images'), $imageName);
       $table->thumbnail=$imageName;
      }
       $table->update();
       return redirect()->route('post_list')->with('status','Post Updated Successfully')->with('expire', 5);

    }
}
