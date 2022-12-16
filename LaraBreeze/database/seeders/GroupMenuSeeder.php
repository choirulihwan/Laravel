<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class GroupMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('group_menus')->insert([
            ['group_id' => 1, 'menu_id' => 1],
            ['group_id' => 1, 'menu_id' => 2],
            ['group_id' => 1, 'menu_id' => 3],
            ['group_id' => 1, 'menu_id' => 4],
            ['group_id' => 1, 'menu_id' => 5],
            ['group_id' => 1, 'menu_id' => 6],
            ['group_id' => 1, 'menu_id' => 7],
            ['group_id' => 1, 'menu_id' => 8],
        ]);
    }
}
