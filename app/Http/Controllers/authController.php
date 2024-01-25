<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class authController extends Controller
{
    public function dashboard(){
        if(Auth::user()->role == 'admin'){
            return redirect()->route('admin#homePage');
        }
        else{
            return redirect()->route('user#homePage');
        }
    }

    //direct login page
    public function loginPage(){
        return view('user.login');
    }

    //direct register page
    public function registerPage(){
        return view('user.register');
    }
}
