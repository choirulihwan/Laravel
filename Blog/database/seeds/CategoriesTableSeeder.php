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
        ]);

        App\Category::create([
            'name'   => 'Otomotif',            
        ]);

        App\Category::create([
            'name'   => 'Politik',            
        ]);
    }
}
