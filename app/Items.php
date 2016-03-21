<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    public function categories()
    {
    	return $this->belongsToMany('App\Categories','ic_relations', 'item_id', 'category_id');
    }
}
