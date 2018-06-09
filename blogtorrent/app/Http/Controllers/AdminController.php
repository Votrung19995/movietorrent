<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //go admin page:
    public function goAdmin(){
        return view('admin');
    }
}
