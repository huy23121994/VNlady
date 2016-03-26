<?php

namespace App\Http\Controllers;

use App\Items;
use App\Categories;
use App\Ic_relations;
use Illuminate\Http\Request;

use App\Http\Requests;

class ViewController extends Controller{
    
    public function getIndex(){
    	$items = Items::orderBy('created_at','desc')->paginate(8);
    	return view('frontend/index')->with('items',$items);
    }

    public function getItem($id){
    	$item = Items::find($id);
    	if (!$item) {
    		return view('errors/404');
    	}

        return view('frontend/show-item')->with('item',$item);
    }

    public function getCategory($id){
    	$category = Categories::find($id);
    	$items = $category->items()->orderBy('created_at','desc')->paginate(8);
    	return view('frontend/index')->with('items',$items)
    								 ->with('category',$category);
    }

}
