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
        $channel1 = ['title' => 'Religion'];
        $channel2 = ['title' => 'Football'];
        $channel3 = ['title' => 'Economics'];
        $channel4 = ['title' => 'Travel'];
        $channel5 = ['title' => 'Health'];
        $channel6 = ['title' => 'Beauty'];
        $channel7 = ['title' => 'Science'];
        
        App\Channel::create($channel1);
        App\Channel::create($channel2);
        App\Channel::create($channel3);
        App\Channel::create($channel4);
        App\Channel::create($channel5);
        App\Channel::create($channel6);
        App\Channel::create($channel7);
        
    }
}
