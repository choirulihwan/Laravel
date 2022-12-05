<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use App\Category;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Post::class, function (Faker $faker) {
    $title = $this->faker->sentence(mt_rand(2,8));
    $slug = Str::slug($title, '-');
    $cat_id = mt_rand(1,7);
    $cat = Category::find($cat_id);

    return [
        'title' => $title,
        'content' => collect($this->faker->paragraphs(mt_rand(5,20)))
                        ->map(function ($p) {
                            return '<p>'.$p.'</p>';
                        })->implode(''),
        'category_id' => $cat_id,
        // 'featured'  => $faker->imageUrl($width = 640, $height = 480),        
        'featured' => 'https://source.unsplash.com/500x400?'.$cat->slug,
        'slug' => $slug,
        'user_id' => 1,
    ];
});
