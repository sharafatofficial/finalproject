<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\AddPost;
use App\Models\Category;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $tags=Tag::all();
        $category=Category::all();
        $posts=AddPost::take(2)->get();
        $tranding=AddPost::where('tranding','1')->orderBy('id', 'desc')->get();
        $latestPosts = AddPost::latest()->take(2)->get();
        return view('frontend.index',compact('tags','category','posts','tranding','latestPosts'));
    }
}
