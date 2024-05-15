<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class TagController extends Controller
{
    function store_tag(Request $request){
        //  dd($request->all());
       $category=new Tag;
       $category->name=$request->name;
       $category->save();
       return redirect()->route('tag_list')->with('status','Tag Added Successfully');
     }

     function view_tag(){
        $tag=Tag::all();
  
        return view('backend.tag.tag_view',compact('tag'));
     }

     function delete($id){
       Tag::find($id)->delete();

       return redirect()->back();
     }

     function edit($id){

        $tag=Tag::find($id)->first();
        return view('backend.tag.tag_add',compact('tag'));
     }

     function update(Request $request ,$id){

        $table=Tag::find($id);
        $table->name=$request->name;
        $table->update();
        
        return redirect()->route('tag_list')->with('status','Tag Updated Successfully');
     }
}
