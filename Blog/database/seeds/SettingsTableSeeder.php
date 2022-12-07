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
        	'site_name'			=> "SBD Blog",
        	'contact_number'	=> "087839806882",
        	'contact_email'		=> "support@sbd.com",
        	'address'			=> "Bantul Yogyakarta"
        ]);
    }
}
