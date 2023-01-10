<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use DB;

class Create extends Component
{
    public $name;
    public $editState = false;
    public $email;
    public $userRole = [];
    public $user;
    
    protected $rules = [
        'name' => 'required',
        'email' => 'required|email:dns',
        'userRole' => 'required',        
    ];

    protected $listeners = [
        'user-edit' => 'edit',
        'user-delete'    => 'delete'
    ];

    public function render()
    {
        $roles = Role::all();
        return view('livewire.user.create', [
            'roles'    => $roles
        ]);
    }

    public function store() 
    {        
        $this->validate();
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,  
            'default_lang'  => 'id',    
            'password'  => Hash::make('password')      
        ]);  
        
        $user->assignRole($this->userRole);

        $this->reset_input();
        session()->flash('message', 'User inserted.');
    }

    public function edit($id)
    {                
        $user = User::find($id);        
        $this->name = $user->name;        
        $this->email = $user->email;        
        $this->editState = true;
        $this->user = $user;
        $this->userRole = $user->roles[0]->id;
    }

    public function update($id) {
        $this->validate();

        $user = User::find($id);
        $user->name = $this->name; 
        $user->email = $this->email;        
        $user->save();       
        
        DB::table('model_has_roles')->where('model_id',$id)->delete();    
        $user->assignRole($this->userRole);

        $this->reset_input();
        session()->flash('message', 'User Updated.');
    }

    public function delete() {
        session()->flash('message', 'User deleted.');
    }

    public function reset_input() 
    {
        $this->name = ''; 
        $this->email = '';
        $this->userRole = [];
        $this->emit('user-created');

        $this->editState = false;
    }

}
