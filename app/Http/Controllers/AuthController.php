<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\RegisterMail;
use App\Mail\ForgotPasswordMail;
use Mail;
use Hash;
use Str;
use Auth;

class AuthController extends Controller
{
    function login(){
        return view('auth.login');
    }

    function register(){
        return view('auth.register');
    }

    function forget(){
        return view('auth.forget_password');
    }

    function reset($token){
        $user = User::where('remember_token', '=', $token)->first();
        if(!empty($user)){
            $data['user'] = $user;
            return view('auth.reset', $data);
        }
        else{
            abort(404);
        }
    }

    function reset_password($token, Request $request){
        $user = User::where('remember_token', '=', $token)->first();
        if(!empty($user)){
            if($request->password == $request->confirm_password){
               
               $user->password = Hash::make($request->password);
               if(empty($user->email_verified_at)){
                $user->email_verified_at = date('Y-m-d H:i:s');
               }

                $user->remember_token = Str::random(40);
                $user->save();

                return redirect('login')->with('success', 'Password Successfully reset');
            }
            else{
                return redirect()->back()->with('error', 'Password and Confirm Password not Match!');
            }
        }
        else{
            abort(404);
        }
    }

    function forget_password(Request $request){
        $user = User::where('email', '=', $request->email)->first();
        if(!empty($user)){
            $user->remember_token = Str::random(40);
            $user->save();

            Mail::to($user->email)->send(new ForgotPasswordMail($user));
            return redirect()->back()->with('success', 'Check Your email to reset password!');
        }
        else{
            return redirect()->back()->with('error', 'Email not found. Please enter correct email!');
        }
    }

    function auth_login(Request $request){
        $remember = !empty($request->remember) ? true : false ;
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)){

            if(!empty(Auth::user()->email_verified_at))
            {
            return redirect('panel/dashboard');
            }
            else{
                $user_id = Auth::user()->id;
                Auth::logout();

                $save = User::getSingle($user_id);
                $save->remember_token = Str::random(40);
                $save->save();

                Mail::to($save->email)->send(new RegisterMail($save));
                return redirect('login')->with('success', 'Please Verrify Your Email.');
            }
        }
        else{
            return redirect()->back()->with('error', 'Please Enter Correct Email amd Password!');
        }
    }

    function create_user(Request $request){

        request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);
        
        $save = new User;
        $save->name = trim($request->name);
        $save->email = trim($request->email);
        $save->password = Hash::make($request->password);
        $save->remember_token = Str::random(40);
        $save->save();

        Mail::to($save->email)->send(new RegisterMail($save));
        return redirect('login')->with('success', 'Your Account register Succesfully! Please Verrify Your Email.');
    }

    function verify($token){
        $user = User::where('remember_token', '=', $token)->first();
        if(!empty($user)){
            $user->email_verified_at = date('Y-m-d H:i:s');
            $user->remember_token = Str::random(40);
            $user->save();
            return redirect('login')->with('success', 'Your Account Succesfully Verified!');
        }
        else{
            abort(404);
        }
    }

    function logout(){
        Auth::logout();
        return redirect('login');
    }

}
