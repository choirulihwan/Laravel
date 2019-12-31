<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        App\Settings::create([
        	'site_name'			=> "Laravel's Blog",
        	'contact_number'	=> "087839806881",
        	'contact_email'		=> "support@laravelsblog.com",
        	'address'			=> "Jl. Tentara pelajar no.7 Yogyakarta"
        ]);
    }
}
