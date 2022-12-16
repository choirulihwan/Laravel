<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Module;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Module::create([
            'name'   => 'view group',
            'label'   =>  'view',
            'link'   => 'group.index',
            'menu_id' => 3,                         
        ]);

        Module::create([
            'name'   => 'create group',
            'label'   =>  'create',
            'link'   => 'group.create|group.store',
            'menu_id' => 3,                         
        ]);

        Module::create([
            'name'   => 'edit group',
            'label'   =>  'edit',
            'link'   => 'group.edit|group.update',
            'menu_id' => 3,                         
        ]);

        Module::create([
            'name'   => 'delete group',
            'label'   =>  'delete',
            'link'   => 'group.destroy',
            'menu_id' => 3,                         
        ]);

        // privilege
        Module::create([
            'name'   => 'view privilege',
            'label'   =>  'view',
            'link'   => 'privilege.index',
            'menu_id' => 7,                         
        ]);

        Module::create([
            'name'   => 'edit privilege',
            'label'   =>  'edit',
            'link'   => 'privilege.edit|privilege.update',
            'menu_id' => 7,                         
        ]);

        Module::create([
            'name'   => 'delete privilege',
            'label'   =>  'delete',
            'link'   => 'privilege.destroy',
            'menu_id' => 7,                         
        ]);

        //user
        Module::create([
            'name'   => 'view user',
            'label'   =>  'view',
            'link'   => 'user.index',
            'menu_id' => 4,                         
        ]);

        Module::create([
            'name'   => 'create user',
            'label'   =>  'create',
            'link'   => 'user.create|user.store',
            'menu_id' => 4,                         
        ]);

        Module::create([
            'name'   => 'edit user',
            'label'   =>  'edit',
            'link'   => 'user.edit|user.update',
            'menu_id' => 4,                         
        ]);

        Module::create([
            'name'   => 'delete user',
            'label'   =>  'delete',
            'link'   => 'user.destroy',
            'menu_id' => 4,                         
        ]);

        //menu
        Module::create([
            'name'   => 'view menu',
            'label'   =>  'view',
            'link'   => 'menu.index',
            'menu_id' => 5,                         
        ]);

        Module::create([
            'name'   => 'create menu',
            'label'   =>  'create',
            'link'   => 'menu.create|menu.store',
            'menu_id' => 5,                         
        ]);

        Module::create([
            'name'   => 'edit menu',
            'label'   =>  'edit',
            'link'   => 'menu.edit|menu.update',
            'menu_id' => 5,                         
        ]);

        Module::create([
            'name'   => 'delete menu',
            'label'   =>  'delete',
            'link'   => 'menu.destroy',
            'menu_id' => 5,                         
        ]);

        //modul
        Module::create([
            'name'   => 'view module',
            'label'   =>  'view',
            'link'   => 'module.index',
            'menu_id' => 6,                         
        ]);

        Module::create([
            'name'   => 'create module',
            'label'   =>  'create',
            'link'   => 'module.create|module.store',
            'menu_id' => 6,                         
        ]);

        Module::create([
            'name'   => 'edit module',
            'label'   =>  'edit',
            'link'   => 'module.edit|module.update',
            'menu_id' => 6,                         
        ]);

        Module::create([
            'name'   => 'delete module',
            'label'   =>  'delete',
            'link'   => 'module.destroy',
            'menu_id' => 6,                         
        ]);
    }
}
