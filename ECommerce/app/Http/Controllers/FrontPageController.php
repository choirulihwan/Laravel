<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class FrontPageController extends Controller
{
    //
    public function index(){
    	return view('index', ['products' => Product::paginate(3)]);
    }
}
