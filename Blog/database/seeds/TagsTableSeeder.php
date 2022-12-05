<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Tag::create([
            'tag'   => 'pemain',            
        ]);

        App\Tag::create([
            'tag'   => 'moto-gp',            
        ]);

        App\Tag::create([
            'tag'   => 'menteri',            
        ]);

        App\Tag::create([
            'tag'   => 'komputer',            
        ]);

        App\Tag::create([
            'tag'   => 'artis',            
        ]);

        App\Tag::create([
            'tag'   => 'penyakit',            
        ]);

        App\Tag::create([
            'tag'   => 'warung',            
        ]);
    }
}
