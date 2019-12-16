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
        	'name' 		=> 'choirul ihwan',
        	'email'		=> 'aristhu_oracle@yahoo.com',
        	'password'	=> bcrypt('1234')
        ]);
    }
}
