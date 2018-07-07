<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Glo;

class AdminController extends Controller
{
    //go admin page:
    public function goAdmin(){
        $category = Category::all();
        $global = Glo::all();
        return view('admin')->with(array('categorys'=>$category, 'globals'=>$global));
    }
}
