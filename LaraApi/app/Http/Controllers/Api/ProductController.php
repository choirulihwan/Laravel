<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    //
    public function index()
    {
        $products = Product::latest()->paginate(6);

        return new ProductResource(true, 'List Products', $products);
    }

    public function show(Product $product)
    {
        return new ProductResource(true, 'Product Found', $product);
    }

    public function showname(Request $request)
    {        
        $term = $request->name;
        $product = Product::where('name','LIKE',"%{$term}%")->get();      
        return new ProductResource(true, 'Product By Name Found', $product);
    }
}
