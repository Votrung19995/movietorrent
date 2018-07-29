<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventory;
use App\Category;
use App\Glo;
use DateTime;


class MovieController extends Controller
{
    //go to movie detail:
    public function movieDetail(Request $request, $slug){
        //get current day:
        $currentDay = new DateTime();
        $detail = Inventory::where('slug','=',$slug)->first();
        if(!empty($detail)){
            //get category:
            $category = Category::where('categoryid',$detail->categoryid)->first();
            //get global:
            $global = Glo::where('globalid',$detail->globalid)->first();
            //get related movie:
            $relates = Inventory::where('categoryid','=',$detail->categoryid)->orderByRaw('RAND()')->take(8)->orderBy('created', 'desc')->skip(0)->get();
            //get trailer phim:
            $body = explode('https://www.youtube.com/watch?v=', $detail->trailer);
            $trailer = $body[1];
            return view('movie')->with(array('movie'=>$detail,'category'=>$category->name, 'trailer'=>$trailer, 'global'=>$global->name, 'relates'=>$relates, 'currentDay'=>$currentDay));
        }
        else{
            return redirect('/redirect/404');
        }
    }
}
