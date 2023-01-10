<?php

namespace App\Http\Livewire\Role;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class Create extends Component
{
    public $name;
    public $editState = false;
    public $roles;
    public $rolePermission = [];

    protected $rules = [
        'name' => 'required',
        'rolePermission' => 'required',        
    ];
    
    protected $listeners = [
        'role-edit' => 'edit',
        'role-delete'   => 'delete',
    ];

    public function render()
    {
        $permission = Permission::get();        
        return view('livewire.role.create', [
            'permission'    => $permission
        ]);
    }

    public function store() 
    {        
        $this->validate();
        
        $role = Role::create([
            'name' => $this->name,
            'guard_name' => 'web',            
        ]);          
        
        $role->syncPermissions($this->rolePermission);
        $this->reset_input();
        session()->flash('message', 'Role inserted.');
    }

    public function edit($id)
    {        
        $role = Role::find($id);
        $this->name = $role->name;        
        $this->editState = true;
        $this->roles = $role;

        $rolePermission = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();        

        $this->rolePermission = array_values($rolePermission); 
    }

    public function update($id) {
        $this->validate();
        
        $role = Role::find($id);
        $role->name = $this->name;        
        $role->save();       
        $role->syncPermissions($this->rolePermission);    
        $this->reset_input();
        session()->flash('message', 'Role updated.');
    }

    public function delete() {
        session()->flash('message', 'Role deleted.');
    }

    public function reset_input() 
    {
        $this->name = '';   
        $this->rolePermission = [];    
        $this->emit('role-created');
        $this->editState = false;
    }

}
