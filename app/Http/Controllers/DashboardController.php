<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function dashboard(){

        return view('backend.dashboard');
    } 

    function add_post(){
        return view('backend.post_add');
    }
}
