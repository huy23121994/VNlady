<?php

namespace App\Http\Controllers;

use App\Items_tags;
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
        // convert slug
        $name_to_slug = str_replace(" ", "-", strtolower(trim($data['tag_name'])) );
        $slug = str_replace(" ", "-", strtolower(trim($data['slug'])) );

        $tag = new Tag;
        $tag->tag_name = trim($data['tag_name']);
        if ($data['slug']!=null) {
            $exist_tag = Tag::where('slug',$name_to_slug)->first();
            if ($exist_tag) {
                return redirect('/manager/tag')->withInput($request->except('slug'))
                                               ->with('error','This slug was exist');
            }else{
                $tag->slug = $slug;
            }
        }else{
            $exist_tag = Tag::where('slug',$name_to_slug)->first();
            if ($exist_tag) {
                return redirect('/manager/tag')->withInput($request->except('slug'))
                                               ->with('error','This slug was exist');
            }else{
                $tag->slug = $name_to_slug;
            }
        }
        $tag->save();
        return redirect('/manager/tag');
    }

    // public function show($id)
    // {
    //     //
    // }

    public function Edit($id)
    {
        $tag = Tag::find($id);
        return view('backend/tags/tag-edit',compact('tag',$tag));
    }

    public function Update(Request $request, $id)
    {
        $data = $request->all();
        $tag = Tag::find($id);
        // convert slug
        $name_to_slug = str_replace(" ", "-", strtolower(trim($data['tag_name'])) );
        $slug = str_replace(" ", "-", strtolower(trim($data['slug'])) );

        if ($data['tag_name'] != null) {
            $tag->tag_name = trim($data['tag_name']);
            if ($slug == $tag['slug']) {
                $tag->save();
                return redirect('/manager/tag/'.$id.'/edit');
            }else{
                $exist_tag = Tag::where('slug',$slug)->first();
                if ($exist_tag) {
                    return redirect('/manager/tag/'.$id.'/edit')->with('error','This slug was exist');
                }else{
                    if ($data['slug']!=null) {
                        $tag->slug = $slug;
                    }else{
                        $exist_tag = Tag::where('slug',$name_to_slug)->first();
                        if ($exist_tag) {
                            return redirect('/manager/tag/'.$id.'/edit')->with('error','This slug was exist');
                        }else{
                            $tag->slug = $name_to_slug;
                        }
                    }
                    $tag->save();
                }
            }
        }
        return redirect('/manager/tag/'.$id.'/edit');
    }

    public function getDestroy($id)
    {
        $tag = Tag::find($id);
        $tag->delete();
        $items_tags = Items_tags::where('tag_id',$id);
        $items_tags->delete();
        return redirect('/manager/tag');
    }
}
