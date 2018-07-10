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
use Storage;

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
        $files = [];
        //check AJAX file upload:
        if ($request->ajax()) {
            if ($request->hasFile('file')) {
                //save file:
                foreach ($request->file('file') as $fileKey => $fileObject ) {
                    // make sure each file is valid
                    if ($fileObject->isValid()) {
                        $destinationFileName = $fileObject->getClientOriginalName();
                        error_log("FILE NAME UPLOAD:::: ".$destinationFileName);
                        array_push($files, $destinationFileName);
                        
                        if(!empty(session('files'))){
                            //add more files:
                            $sFiles = session('files');
                            foreach($sFiles as $file){
                                array_push($files, $file);
                            }
                        }
                        Storage::disk('uploads')->put($destinationFileName, 'Contents');
                    }
                }
                //save session:
                session(['files' => $files]);
                
                foreach($files as $file){
                    error_log('FILES:============>>>>>>??????? '.$file);
                }
                               
            }
        }
        
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
            $fs = session('files');
            if (!empty($fs) && count($fs) > 0) {
                error_log('=======> VAO HAM  COUNT ======>>'.count($fs));
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
                $fileNames = '';

                foreach($fs as $fname){
                    $fileNames = $fileNames.','.$fname;
                }

                $inventory->file = $fileNames;

                if($inventory->save()){
                    //set session for err:
                    session(['err'=>'Đã đăng tin, thông tin đã được cập nhật trong danh sách']);
                    session()->forget('categoryName');
                    session()->forget('inventory');
                    session()->forget('globalName');
                    session()->forget('files');
                }
                else{
                    //set session for err:
                    session(['err'=>'Lỗi đăng tin']);
                }
            }
            else{
                error_log('=======> VAO HAM  LOI ======>>'.count($fs));
                 //set session for err:
                session(['err'=>'Vui lòng upload file']);
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
