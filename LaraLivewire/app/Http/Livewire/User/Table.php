<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;

class Table extends Component
{
    protected $listeners = [
        'user-created' => '$refresh'
    ];

    public function render()
    {
        $users = User::latest()->get();
        foreach($users as $v):
            $user_role[$v->id] = $v->getRoleNames();
        endforeach;

        return view('livewire.user.table', [
            'users'  => $users,
            'user_role' => $user_role
        ]);
    }

    public function edit($id) 
    {        
        $this->emit('user-edit', $id);
    }

    public function destroy($id) 
    {
        $user = User::find($id);
        $user->delete();

        $this->emit('user-delete');
    }
}
