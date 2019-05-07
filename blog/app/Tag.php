<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function posts()
    {
    	return $this->belongsToMany('App\Post');
    	//we are following the convention so we dont need to specify extra peramaetrs like intermediary_table_name, column_id.
    }
}
