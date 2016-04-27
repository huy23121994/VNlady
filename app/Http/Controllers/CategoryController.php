<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Categories;
use App\Ic_relations;
use App\Http\Requests\CategoryRequest;
use Session;

class CategoryController extends Controller
{
    public function getIndex()
    {
        if (!Session::has('admin')) {
            return redirect('/');
        }
        $categories = Categories::all()->sortByDesc('created_at');
        return view('backend/categories/category',compact('categories',$categories));
    }

    // public function create()
    // {
    //     //
    // }

    public function postStore(CategoryRequest $request)
    {
        $data = $request->all();
        // convert slug
        $name_to_slug = str_slug($data['category'], "-");
        $slug = str_slug($data['slug'], "-");

        $category = new Categories;
        $category->category = trim($data['category']);
        if ($data['slug']!=null) {
            $exist_slug = Categories::where('slug',$name_to_slug)->first();
            if ($exist_slug) {
                return redirect('/manager/category')->withInput($request->except('slug'))
                                               ->with('error','This slug was exist');
            }else{
                $category->slug = $slug;
            }
        }else{
            $exist_slug = Categories::where('slug',$name_to_slug)->first();
            if ($exist_slug) {
                return redirect('/manager/category')->withInput($request->except('slug'))
                                               ->with('error','This slug was exist');
            }else{
                $category->slug = $name_to_slug;
            }
        }
        $category->save();
        return redirect('/manager/category');
    }

    // public function show($id)
    // {
    //     //
    // }

    public function Edit($id)
    {
        if (!Session::has('admin')) {
            return redirect('/');
        }
        $category = Categories::find($id);
        return view('backend/categories/category-edit',compact('category',$category));
    }

    public function Update(Request $request, $id)
    {
        $data = $request->all();
        $category = Categories::find($id);
        // convert slug
        $name_to_slug = str_slug($data['category'], "-");
        $slug = str_slug($data['slug'], "-");

        if ($data['category'] != null) {
            $category->category = trim($data['category']);
            if ($slug == $category['slug']) {
                $category->save();
                return redirect('/manager/category/'.$id.'/edit');
            }else{
                $exist_slug = Categories::where('slug',$slug)->first();
                if ($exist_slug) {
                    return redirect('/manager/category/'.$id.'/edit')->with('error','This slug was exist');
                }else{
                    if ($data['slug']!=null) {
                        $category->slug = $slug;
                    }else{
                        $exist_slug = Categories::where('slug',$name_to_slug)->first();
                        if ($exist_slug) {
                            return redirect('/manager/category/'.$id.'/edit')->with('error','This slug was exist');
                        }else{
                            $category->slug = $name_to_slug;
                        }
                    }
                    $category->save();
                }
            }
        }
        return redirect('/manager/category/'.$id.'/edit');
    }

    public function getDestroy($id)
    {
        $category = Categories::find($id);
        $category->delete();
        $item_category = Ic_relations::where('category_id',$id);
        $item_category->delete();
        return redirect('/manager/category');
    }
}
