<?php

namespace App\Http\Controllers;

use App\Items;
use App\Categories;
use App\Tag;
use App\Ic_relations;
use Illuminate\Http\Request;

use App\Http\Requests;

class ViewController extends Controller{
    
    public function getIndex(){
    	$items = Items::orderBy('created_at','desc')->paginate(16);
    	return view('frontend/index',['items' => $items]);
    }

    public function getItem($id){
    	$item = Items::find($id);
    	if (!$item) {
    		return view('errors/404');
    	}

        return view('frontend/show-item',['item' => $item]);
    }

    public function getCategory($id){
        $category = Categories::find($id);
        if (!$category) {
            return view('errors/404');
        }
        $items = $category->items()->orderBy('created_at','desc')->paginate(16);
        return view('frontend/index',['items' => $items,'category' => $category]);
    }
    public function getTag($slug){
        $tag = Tag::where('slug',$slug)->first();
        $categories = Categories::all();
        if (!$tag) {
            return view('errors/404');
        }
        $items = $tag->items()->orderBy('created_at','desc')->paginate(16);
        return view('frontend/index',['items' => $items,'tag' => $tag]);
    }

}
