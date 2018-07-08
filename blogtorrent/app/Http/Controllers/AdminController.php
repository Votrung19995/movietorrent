<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Glo;
use App\Inventory;
use Illuminate\Support\Facades\Textarea;
use Sunra\PhpSimple\HtmlDomParser;
use Redirect;
use Session;

class AdminController extends Controller
{
    //go admin page:
    public function goAdmin(){
        $err = "";
        $category = Category::all();
        $global = Glo::all();
        $inventory = new Inventory;
        return view('admin')->with(array('categorys'=>$category, 'globals'=>$global, 'inventory' =>  $inventory, 'error'=>$err));
    }

    //post:
    public function post(Request $request){
        $err = "";
        $cate = Category::all();
        $glo = Glo::all();
        $english = $request->input('english');
        $vietnamese = $request->input('vietnamese');
        $fullpath = $request->input('content');
        $idmb = $request->input('idmb');
        $year = $request->input('year');
        $resolution = $request->input('resolution');
        $global = $request->input('global');
        $feedback = $request->input('feedback');
        $category = $request->input('category');
        $director = $request->input('director');
        error_log("POST: =>".$fullpath);
        $dom = HtmlDomParser::str_get_html($fullpath);
        $imagePath = '';

        //set value for Inventory:
        $inventory = new Inventory;
        $inventory->english = $english;
        $inventory->vietnamese = $vietnamese;
        $inventory->fullpath = $fullpath;
        $inventory->idmd = $idmb;
        $inventory->year = $year;
        $inventory->resolution = $resolution;
        $inventory->globalid = $global;
        $inventory->feedback = $feedback;
        $inventory->directory = $director;

        //set sesion laravel:
        session(['inventory'=>$inventory]);

        if(empty($dom->find('img'))){
            error_log("EMPTY=========>>>".$err."IVEN PATH: ".$inventory->fullpath);
            //set cookie:
            return view('admin')->with(array('err'=>'Vui lòng chọn ảnh và thử lại.', 'categorys'=>$cate, 'globals'=>$glo, 'inventory'=>$inventory));
        }
        else{
            //SAVE:
            $imagePath = $dom->find('img')[0]->src;
            $path = $this->splitImg($imagePath);
            $texts = $this->splitText($fullpath);
            return  $content;
        }
    }

    //split text:
    public function splitText($content){
        $array = [];
        $splits = preg_split('/(<img[^>]+\>)/i', $content, -1, PREG_SPLIT_DELIM_CAPTURE);
        //foreach:
        if(count($splits) > 0){
            foreach($splits as $split){
                 //check if not image:
                 $domImage = HtmlDomParser::str_get_html($split);
                 if(empty($domImage->find('img'))){
                    array_push($array,$split);
                 }
            }
        }
        return $array;
    }
    
    //get img name from src
    public function splitImg($content){
        $paths = explode('images/', $content);
        $img ='';
        if(empty($paths)){
            $img = $paths[1];
        }
        return $img;
    }
}
