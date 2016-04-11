<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Tag;
use App\Http\Requests\TagRequest;

class TagController extends Controller
{
    public function getIndex()
    {
        $tags = Tag::all()->sortByDesc('created_at');
        return view('backend/tags/tag',compact('tags',$tags));
    }

    // public function create()
    // {
    //     //
    // }

    public function postStore(TagRequest $request)
    {
        $data = $request->all();
        $tag = new Tag;
        $tag->tag_name = $data['tag_name'];
        $tag->slug = $data['slug'];
        $tag->save();
        return redirect('/manager/tag');
    }

    public function show($id)
    {
        //
    }

    public function Edit($id)
    {
        //
    }

    public function Update(Request $request, $id)
    {
        //
    }

    public function getDestroy($id)
    {
        //
    }
}
