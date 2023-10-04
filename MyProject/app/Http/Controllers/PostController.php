<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;

class PostController extends Controller
{
    public function index() 
    {
        // dd(request('search'));
        $title = '';
        if (request('category')):
            $category = Category::firstWhere('slug', request('category'))->name;
            $title = ' in '.$category;
        endif;

        if (request('author')):
            $author = User::firstWhere('username', request('author'))->name;
            $title = ' by '.$author;
        endif;
        
        return view('posts', [
            'title' => 'All posts '.$title,
            'active'    => 'post',
            // 'posts' => Post::all(),
            // menghindari n+1 problems (eager loading)
            'posts' => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(7)->withQueryString(),
        ]);
    }

    public function show(Post $post) 
    {
        return view('post', [
            "title" => "Single post",
            'active'    => 'post',
            'posts' => $post
        ]);
    }
}
