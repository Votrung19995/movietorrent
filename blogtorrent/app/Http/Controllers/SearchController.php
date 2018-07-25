<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventory;

class SearchController extends Controller
{
    public function autoComplete(Request $request) {
        $query = $request->get('term','');
        $searchs = Inventory::where('vietnamese','LIKE','%'.$query.'%')->get();
        $data=array();
        foreach ($searchs as $search) {
            $data[] = array('value'=>$search->vietnamese,'id'=>$search->id);
        }
        if(count($data))
            return $data;
        else
            return ['value'=>'No Result Found','id'=>''];
    }
}
