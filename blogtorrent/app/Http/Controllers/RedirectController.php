<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RedirectController extends Controller
{
    //go suscess:
    public function goSucess(){
        return view('registersucess');
    }
}
