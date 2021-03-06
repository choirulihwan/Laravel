<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        App\User::create([
        	'name'		=> 'choirul',
        	'password'	=> bcrypt('password'),
        	'email'		=> 'aristhu_oracle@yahoo.com',
        	'admin'		=> 1,
        	'avatar'	=> 'avatars/avatar.png',

        ]);

        App\User::create([
            'name'      => 'erna',
            'password'  => bcrypt('password'),
            'email'     => 'ernaemcha@yahoo.com',
            'admin'     => 1,
            'avatar'    => 'avatars/avatar2.png',

        ]);
    }
}
