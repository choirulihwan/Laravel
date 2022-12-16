<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Menu::create([
            'name'   => 'Dashboard',
            'link'   =>  'dashboard',
            'icon'   => '',
            'menu_id' => null,
            'menu_order' => 1,            
        ]);

        Menu::create([
            'name'   => 'System',
            'link'   =>  null,
            'icon'   => '',
            'menu_id' => null,   
            'menu_order' => 2,                     
        ]);

        Menu::create([
            'name'   => 'Group',
            'link'   =>  'group.index',
            'icon'   => '',
            'menu_id' => 2, 
            'menu_order' => 1,                
        ]);

        Menu::create([
            'name'   => 'User',
            'link'   =>  'user.index',
            'icon'   => '',
            'menu_id' => 2, 
            'menu_order' => 2,                
        ]);

        Menu::create([
            'name'   => 'Menu',
            'link'   =>  'menu.index',
            'icon'   => '',
            'menu_id' => 2, 
            'menu_order' => 3,               
        ]);

        Menu::create([
            'name'   => 'Module',
            'link'   =>  'module.index',
            'icon'   => '',
            'menu_id' => 2, 
            'menu_order' => 4,               
        ]);

        Menu::create([
            'name'   => 'Authorization',
            'link'   =>  'privilege.index',
            'icon'   => '',
            'menu_id' => 2, 
            'menu_order' => 4,               
        ]);

        Menu::create([
            'name'   => 'Referensi',
            'link'   =>  'referensi.index',
            'icon'   => '',
            'menu_id' => null, 
            'menu_order' => 3,               
        ]);
    }
}
