<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(PostsTableSeeder::class);
        $this->call(TagsTableSeeder::class);     
        

        // $roles = App\Role::all();
        // // Populate the pivot table
        // App\User::all()->each(function ($user) use ($roles) { 
        //     $user->roles()->attach(
        //         $roles->random(rand(1, 3))->pluck('id')->toArray()
        //     ); 
        // });
    }
}
