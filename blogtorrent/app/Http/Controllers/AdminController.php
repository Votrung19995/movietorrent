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
        $vietnamese = $request->input('vn');
        $fullpath = $request->input('content');
        $idmb = $request->input('score');
        $year = $request->input('year');
        $resolution = $request->input('resolution');
        $global = $request->input('global');
        $feedback = $request->input('feedback');
        $category = $request->input('category');
        $director = $request->input('director');
        error_log("POST: =>".$fullpath);
        if(empty($fullpath)){
            $fullpath = "<p></p>";
        }
        $dom = HtmlDomParser::str_get_html($fullpath);
        //set value for Inventory:
        $inventory = new Inventory;
        $inventory->english = $english;
        $inventory->vietnamese = $vietnamese;
        $inventory->fullpath = $fullpath;
        $inventory->idmb = $idmb;
        $inventory->year = $year;
        $inventory->resolution = $resolution;
        $inventory->globalid = $global;
        $inventory->feedback = $feedback;
        $inventory->director = $director;
        $inventory->categoryid = $category;

        //set sesion laravel:
        session(['inventory'=>$inventory]);

        if(empty($dom->find('img'))){
            error_log("EMPTY=========>>>".$err."IVEN PATH: ".$inventory->fullpath);
            error_log('CATE: '. $inventory->categoryid);
            //set session:
            //set session for user:
            session(['inventory'=>$inventory]);
            //get name by ID global:
            $gl = Glo::where('globalid', $inventory->globalid)->first();
            //set session for user:
            session(['globalName'=>$gl]);
            //get name by ID category:
            $c = Category::where('categoryid', $inventory->categoryid)->first();
            //set session for user:
            session(['categoryName'=>$c]);
            //set session for err:
            session(['err'=>'Vui lòng chọn ảnh và thử lại.']);
            return Redirect::to('/admin/home');
        }
        else{
            //SAVE:
            $imagePath = $dom->find('img')[0]->src;
            $path = $this->splitImg($imagePath);
            error_log("PATHHHHHHHH++++++++".$path);
            $texts = $this->splitText($fullpath);
            $ct = '';
            foreach($texts as $text){
                $ct = $ct.$text;
            }
            //set value:
            $inventory->image = $path;
            $inventory->content = $ct;

            if($inventory->save()){
               //set session for err:
               session(['err'=>'Đã đăng tin, thông tin đã được cập nhật trong danh sách']);
               session()->forget('categoryName');
               session()->forget('inventory');
               session()->forget('globalName');
            }
            else{
               //set session for err:
               session(['err'=>'Lỗi đăng tin']);
            }
            return Redirect::to('/admin/home');
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
        if(!empty($paths)){
            $img = $paths[1];
        }
        return $img;
    }
}
