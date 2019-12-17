<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    
	use SoftDeletes;

    protected $fillable = [
    	'title', 'content', 'category_id', 'featured', 'slug'
    ];

    //accessor laravel 
    public function getFeaturedAttribute($featured){
    	return asset($featured);
    }

    protected $dates = ['deleted_at'];

    //post only has 1 category
    public function category() {
    	return $this->belongsTo('App\Category');
    }
}
