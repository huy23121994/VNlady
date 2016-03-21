<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
	public function items()
	{
		return $this->belongsToMany('App\Items','ic_relations','category_id','item_id');
	}
}
