<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Settings;
use App\Category;
use App\Post;

class FrontEndController extends Controller
{
    //
    public function index(){
    	return view('index')
    		->with('title', Settings::first()->site_name)
    		//mengambil 4 kategori pertama
    		//->with('categories', Category::all()->take(4)->get());
    		->with('categories', Category::all())
    		->with('first_post', Post::orderBy('created_at', 'desc')->first())
    		->with('second_post', Post::orderBy('created_at', 'desc')->skip(1)->take(1)->get()->first())
    		->with('third_post', Post::orderBy('created_at', 'desc')->skip(2)->take(1)->get()->first())
    		->with('laravel', Category::find(4))
    		->with('django', Category::find(3))
    		->with('wordpress', Category::find(2))
    		->with('settings', Settings::first())
    		;
    	
    }
}
