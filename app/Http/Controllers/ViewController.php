<?php

namespace App\Http\Controllers;

use App\Items;
use App\Categories;
use App\Ic_relations;

use Illuminate\Http\Request;

use App\Http\Requests;

class ViewController extends Controller{
    
    public function getIndex(){
    	$items = Items::all()->sortByDesc('created_at');
    	return view('frontend/index')->with('items',$items);
    }

    public function getItem($id){
    	$item = Items::find($id);
    	if (!$item) {
    		return 'Ko ton tai id';
    	}

        return view('frontend/show-item')->with('item',$item);
    }

    public function getCategory($id){
    	$category = Categories::find($id);
    	$items = $category->items->sortByDesc('created_at');
    	return view('frontend/index')->with('items',$items)
    								 ->with('category',$category);
    }

}
