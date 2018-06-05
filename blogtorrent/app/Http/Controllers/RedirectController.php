<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use Cookie;

class RedirectController extends Controller
{
    //go suscess:
    public function goSucess(){
        return view('registersucess');
    }

    //go 404 page
    public function go404(){
        return view('404');
    }

    //Log out user
    public function goHome(){
        //set cookie:
        return Redirect::to('/')->withCookie(Cookie::forget('isRegister'));
    }
}
