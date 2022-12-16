<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;


class GroupModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('group_modules')->insert([
            ['group_id' => 1, 'module_id' => 1],
            ['group_id' => 1, 'module_id' => 2],
            ['group_id' => 1, 'module_id' => 3],
            ['group_id' => 1, 'module_id' => 4], 
            //privilege
            ['group_id' => 1, 'module_id' => 5],
            ['group_id' => 1, 'module_id' => 6],
            ['group_id' => 1, 'module_id' => 7],            
        ]);
    }
}
