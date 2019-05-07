<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $tables = 'categories';

//we are manually telling Laravel to use the categories table when we are working this model.
    public function posts()
    {
    	return $this->hasMany('App\Post');
    }
}


//if we wont follow the convention to name the forign key we have to defing the coumn name in the relationship.We follow the convention and named our column in posts table as category_id
