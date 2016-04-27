<?php

namespace App\Http\Controllers;

use App\Items;
use App\Ic_relations;
use App\Tag;
use App\Categories;
use App\Items_tags;

use Validator;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;

class ItemController extends Controller{

    public function getIndex(){
        if (!Session::has('admin')) {
            return redirect('/');   
        }
        $items = Items::all()->sortByDesc('created_at');
        return view('backend/item')->with('items',$items);
        
    }

    public function getCreate(){
        if (!Session::has('admin')) {
            return redirect('/');
        }
        $tags = Tag::all();
        $categories = Categories::all();
        return view('backend/item-create',['tags' => $tags , 'categories' => $categories ]);
    }

    public function postStore(Request $request){
        $data = $request->all();

        $validator = Validator::make($data,
            [
                'title' => 'required|max:255',
                'description' => 'max:1000',
                'embed_link' => 'URL|max:255',
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
            $item->content = $data['content'];
            $item->user_id = $request->session()->get('admin')['id'];
            $item->save();

            foreach ($data['categories'] as $key => $category) {
                $relation = new Ic_relations;
                $relation->item_id = $item['id'];
                $relation->category_id = $category;
                $relation->save();
            }
            if (isset($data['tags'])) {
                foreach ($data['tags'] as $key => $tag) {
                    $item_tag = new Items_tags;
                    $item_tag->item_id = $item['id'];
                    $item_tag->tag_id = $tag;
                    $item_tag->save();
                }
            }
            echo 'success';
        }else{
            echo 'fail';
        }
    }

    public function Edit($id){
        if (!Session::has('admin')) {
            return redirect('/');
        }
        $tags = Tag::all();
        $categories = Categories::all();
        $item = Items::find($id);
        return view('backend/item-detail',['item' => $item,'tags' => $tags,'categories' => $categories]);
    }

    public function Update(Request $request, $id){
        $data = $request->all();

        $validator = Validator::make($data,
            [
                'title' => 'required|max:255',
                'description' => 'max:1000',
                'embed_link' => 'URL|max:255',
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
            $item->content = $data['content'];
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

            Items_tags::where('item_id',$id)->delete(); //delete old item_tag relations
            if (isset($data['tags'])) {
                foreach ($data['tags'] as $key => $tag) {
                    $item_tag = new Items_tags;
                    $item_tag->item_id = $item['id'];
                    $item_tag->tag_id = $tag;
                    $item_tag->save();
                }
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
        $items_tags = Items_tags::where('item_id',$id)->delete();
        $item = Items::find($id);

        //delete file
        $file_delete = $item['img_preview'];
        unlink(substr($file_delete, 1));
        
        //delete record
        $item->delete();
        return redirect('/manager/item');
    }
}
