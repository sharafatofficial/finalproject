<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
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

     function delete($id){
      Category::find($id)->delete();

      return redirect()->back();
    }

    function edit($id){

       $cat=Category::find($id)->first();
       return view('backend.category.category_add',compact('cat'));
    }

    function update(Request $request ,$id){

       $table=Category::find($id);
       $table->name=$request->name;
       $table->update();
       
       return redirect()->route('cat_list')->with('status','Category Updated Successfully');
    }
}
