<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //        
        App\Category::create([
            'name'   => 'Sepakbola',  
            'slug'  => 'football'          
        ]);

        App\Category::create([
            'name'   => 'Otomotif', 
            'slug'  => 'automobile'           
        ]);

        App\Category::create([
            'name'   => 'Politik',
            'slug'  => 'politic'            
        ]);

        App\Category::create([
            'name'   => 'Teknologi', 
            'slug'  => 'technology'           
        ]);

        App\Category::create([
            'name'   => 'Gaya Hidup',
            'slug'  => 'lifestyle'            
        ]);

        App\Category::create([
            'name'   => 'Kesehatan', 
            'slug'  => 'health'           
        ]);

        App\Category::create([
            'name'   => 'Kuliner', 
            'slug'  => 'food'           
        ]);
    }
}
