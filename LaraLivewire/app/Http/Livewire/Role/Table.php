<?php

namespace App\Http\Livewire\Role;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class Table extends Component
{
    protected $listeners = [
        'role-created' => '$refresh'
    ];

    public function render()
    {
        return view('livewire.role.table', [
            'roles'  => Role::latest()->get()
        ]);
    }

    public function edit($id) 
    {        
        $this->emit('role-edit', $id);
    }

    public function destroy($id) 
    {
        $role = Role::find($id);
        $role->delete();

        $this->emit('role-delete');
    }
}
