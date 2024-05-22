<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\AddPost;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Http\Request;

class IndexController extends Controller
{
     function index(){
        $tags=Tag::all();
        $category=Category::all();
        $posts=AddPost::take(2)->get();
        $tranding=AddPost::where('tranding','1')->orderBy('id', 'desc')->get();
        $latestPosts = AddPost::latest()->take(2)->get();
        return view('frontend.index',compact('tags','category','posts','tranding','latestPosts'));
    }
 
    function cat_detail($id){
        $posts=AddPost::where('category',$id)->first();
        $cat_name=$posts->show_category->name;
       
        $posts=AddPost::where('category',$id)->orderBy('id', 'desc')->get();
        $tags=Tag::all();
        $category=Category::all();
        return view('frontend.cat_detail',compact('posts','tags','category','cat_name'));
    }  

    function tag_detail($id){
        $posts=AddPost::where('tag',$id)->first();
        if($posts !=null){
            $cat_name=$posts->show_tag->name;
        }
        else{
            $cat_name='No Data Found';
        }
        
       
        $posts=AddPost::where('tag',$id)->orderBy('id', 'desc')->get();
        $tags=Tag::all();
        $category=Category::all();
        return view('frontend.cat_detail',compact('posts','tags','category','cat_name'));
    }  


    function post_detail($id){

        $post=AddPost::where('id',$id)->first();
        $comment=Comment::where('post_id',$id)->get();
        return view('frontend.post_detail',compact('post','comment'));
    }

    function post_comment(Request $request,$id){
        Comment::create($request->all());
        return redirect()->back();
    }


}
