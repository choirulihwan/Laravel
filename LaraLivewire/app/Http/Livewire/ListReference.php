<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Reference;

class ListReference extends Component
{
    protected $listeners = [
        'ref-created' => '$refresh'
    ];

    public function render()
    {
        return view('livewire.list-reference', [
            'refs'  => Reference::latest()->get()
        ]);
    }

    public function edit($id) 
    {        
        $this->emit('ref-edit', $id);
    }

    public function destroy($id) 
    {
        $ref = Reference::find($id);
        $ref->delete();
    }
}
