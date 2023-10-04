<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

class Post 
{
    // use HasFactory;
    private static $blog_posts = [
        [
            "judul"     => "Post pertama",
            "slug"      => "post-pertama",
            "author"    => "choirul ihwan",
            "content"   => "Lorem ipsum dolor sit amet consectetur adipisicing elit. In tenetur labore repellendus aliquid consectetur et quasi temporibus corporis consequuntur reiciendis. Ullam veniam dolorum ad laborum est, accusamus ea. Quisquam, tempora!"
        ], 
        [
            "judul"     => "Post kedua",
            "slug"      => "post-kedua",
            "author"    => "choirul ihwan",
            "content"   => "Dolore amet maxime similique dolor ex. Distinctio magni odio, hic aut perferendis, minus molestias aliquam assumenda repellendus iure earum molestiae voluptate saepe optio beatae ex fuga commodi? Tenetur soluta iste amet nisi odit quae maiores, delectus cum quo!"
        ]
    ];

    public static function all() 
    {
        return collect(self::$blog_posts);
    }

    public static function find($slug) 
    {
        
        $posts = static::all();
        // $post = [];
        // foreach($posts as $p) {
        //     if ($p['slug'] == $slug):
        //         $post = $p;
        //     endif;
        // }
        return $posts->firstWhere('slug', $slug);
    }
}
