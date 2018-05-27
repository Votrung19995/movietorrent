<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //go register:
    public function goRegister(){
        return view('register');
    }
}
