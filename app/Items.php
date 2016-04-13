<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    public function categories()
    {
    	return $this->belongsToMany('App\Categories','ic_relations', 'item_id', 'category_id');
    }

    public function tags()
    {
    	return $this->belongsToMany('App\Tag','items_tags', 'item_id', 'tag_id');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
