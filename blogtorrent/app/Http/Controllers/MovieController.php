<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventory;
use App\Category;


class MovieController extends Controller
{
    //go to movie detail:
    public function movieDetail(Request $request, $slug){
        $detail = Inventory::where('slug','=',$slug)->first();
        if(!empty($detail)){
            //get category:
            $category = Category::where('categoryid',$detail->categoryid)->first();
            //get trailer phim:
            $body = explode('https://www.youtube.com/watch?v=', $detail->trailer);
            $trailer = $body[1];
            return view('movie')->with(array('movie'=>$detail,'category'=>$category->name, 'trailer'=>$trailer));
        }
        else{
            return redirect('/redirect/404');
        }
    }
}
