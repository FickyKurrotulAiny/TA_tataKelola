<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(){
            return view('auth.login');
    }

    public function postlogin(Request $request){
        if(Auth::attempt($request->only('username','password'))){
            return redirect('/');
        }
        return redirect('login')->with('error', 'Login Gagal, silahkan login kembali!');
    }


    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }



}
