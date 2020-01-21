<?php

use Illuminate\Database\Seeder;

class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $channel1 = ['title' => 'Religion', 'slug' => 'religion'];
        $channel2 = ['title' => 'Football', 'slug' => 'football'];
        $channel3 = ['title' => 'Economics', 'slug' => 'economics'];
        $channel4 = ['title' => 'Travel', 'slug' => 'travel'];
        $channel5 = ['title' => 'Health', 'slug' => 'health'];
        $channel6 = ['title' => 'Beauty', 'slug' => 'beauty'];
        $channel7 = ['title' => 'Science', 'slug' => 'science'];
        
        App\Channel::create($channel1);
        App\Channel::create($channel2);
        App\Channel::create($channel3);
        App\Channel::create($channel4);
        App\Channel::create($channel5);
        App\Channel::create($channel6);
        App\Channel::create($channel7);
        
    }
}
