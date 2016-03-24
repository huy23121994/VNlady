<?php

namespace App\Http\Controllers;

use App\Items;

use App\Ic_relations;

use Validator;

use Illuminate\Http\Request;

use App\Http\Requests;

class ItemController extends Controller{

    public function getIndex(Request $request){
        if ($request->session()->has('admin')) {
            $items = Items::all();
            return view('backend/item')->with('items',$items);
        }
        return redirect('/');
        
    }

    // public function getCreate(){
        
    // }

    public function postStore(Request $request){
        $data = $request->all();

        $validator = Validator::make($data,
            [
                'title' => 'required|max:255',
                'description' => 'required|max:1000',
                'embed_link' => 'required|URL|max:255',
                'categories' => 'required',
                'img' => 'required',
            ]
        );
        if ($validator->fails()) {
            $errors = $validator->messages();
            echo json_encode($errors);
        }elseif ($request->hasFile('img')) {
            $name=uniqid().'.jpg';
            $file = $data['img'];
            $file->move('img/upload',$name);

            $item = new Items;
            $item->title = $data['title'];
            $item->description = $data['description'];
            $item->img_preview = 'img/upload/'.$name;
            $item->embed_link = $data['embed_link'];
            $item->save();

            foreach ($data['categories'] as $key => $category) {
                $relation = new Ic_relations;
                $relation->item_id = $item['id'];
                $relation->category_id = $category;
                $relation->save();
            }
            echo 'success';
        }else{
            echo 'fail';
        }
    }

    public function Edit($id){
        $item = Items::find($id);
        return view('backend/item-detail')->with('item',$item);
    }

    public function Update(Request $request, $id){
        $data = $request->all();

        $validator = Validator::make($data,
            [
                'title' => 'required|max:255',
                'description' => 'required|max:1000',
                'embed_link' => 'required|URL|max:255',
                'categories' => 'required',
            ]
        );
        if ($validator->fails()) {
            $errors = $validator->messages();
            echo json_encode($errors);
        }else{
            $item = Items::find($id);
            $item->title = $data['title'];
            $item->description = $data['description'];
            $item->embed_link = $data['embed_link'];
            if ($request->hasFile('img')) {
                $name = uniqid().'jpg';
                $file = $data['img'];
                $file->move('img/upload',$name);
                $item->img_preview = 'img/upload/'.$name;
            }
            $item->save();

            $relation = Ic_relations::where('item_id',$id)->delete();
            foreach ($data['categories'] as $category) {
                $relation = new Ic_relations;
                $relation->item_id = $id;
                $relation->category_id = $category;
                $relation->save();
            }
            if ($item and $relation) {
                echo "success";
            }else{
                echo "fail";
            }
        }
    }

    public function getDestroy($id){
        $relation = Ic_relations::where('item_id',$id)->delete();
        $item = Items::find($id)->delete();
        return redirect('/manager/item');
    }
}
