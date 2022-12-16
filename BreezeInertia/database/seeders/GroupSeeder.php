<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\MOdels\Group;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Group::create([
            'name'   => 'Administrator'       
        ]);

        Group::create([
            'name'   => 'Manager'       
        ]);

        Group::create([
            'name'   => 'Staff'       
        ]);

    }
}
