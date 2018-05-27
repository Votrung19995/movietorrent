<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //geo login:
    public function goLogin(){
        return view('login');
    }
}
