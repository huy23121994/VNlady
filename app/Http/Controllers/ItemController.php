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
            $items = Items::all()->sortByDesc('created_at');
            return view('backend/item')->with('items',$items);
        }
        return redirect('/');
        
    }

    public function getCreate(){
        return view('backend/item-create');
    }

    public function postStore(Request $request){
        $data = $request->all();

        $validator = Validator::make($data,
            [
                'title' => 'required|max:255',
                'description' => 'required|max:1000',
                'embed_link' => 'required|URL|max:255',
                'categories' => 'required',
                'img' => 'required|image|max:300',
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
            $item->img_preview = '/img/upload/'.$name;
            $item->embed_link = $data['embed_link'];
            $item->user_id = $request->session()->get('admin')['id'];
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
                'img' => 'image|max:300',
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

                unlink(substr($item['img_preview'], 1));// delete old file

                $name = uniqid().'.jpg';
                $file = $data['img'];
                $file->move('img/upload',$name);
                $item->img_preview = '/img/upload/'.$name;
            }
            $item->save();

            $relation = Ic_relations::where('item_id',$id)->delete(); //delete old relations

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
        $item = Items::find($id);

        //delete file
        $file_delete = $item['img_preview'];
        unlink(substr($file_delete, 1));
        
        //delete record
        $item->delete();
        return redirect('/manager/item');
    }
}
