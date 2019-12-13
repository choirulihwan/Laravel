<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //post only has 1 category
    public function category() {
    	return $this->belongsTo('App\Category');
    }
}
