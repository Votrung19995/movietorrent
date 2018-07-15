<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventory;

class HomeController extends Controller
{
    //go index:
    public function index(){
        //load categorys:
        $newmovies = Inventory::where('isadd','=','Phim mới')->where('categoryid','!=',6)->take(6)->orderBy('created', 'desc')->skip(0)->get();
        //load categorys:
        $newupdates = Inventory::where('isadd','=','Phim cập nhật')->where('categoryid','!=',6)->take(5)->orderBy('created', 'desc')->skip(0)->get();
        //load categorys:
        $trailers = Inventory::where('categoryid','=',6)->take(5)->orderBy('created', 'desc')->skip(0)->get();
        return view ('welcome')->with(array('newmovies'=>$newmovies, 'newupdates'=>$newupdates, 'trailers'=>$trailers));
    }
}
