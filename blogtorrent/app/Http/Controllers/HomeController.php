<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //go index:
    public function index(){
        return view ('welcome');
    }
}
