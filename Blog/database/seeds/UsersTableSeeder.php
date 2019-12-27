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
        $user = App\User::create([
        	'name' 		=> 'choirul ihwan',
        	'email'		=> 'aristhu_oracle@yahoo.com',
        	'password'	=> bcrypt('1234'),
            'admin'     => 1
        ]);

        App\Profile::create([
            'user_id'   => $user->id,
            'about'     => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).',
            'facebook'  => 'facebook.com',
            'youtube'   => 'youtube.com',
            'avatar'    => 'uploads/avatars/1.png'
        ]);
    }
}
