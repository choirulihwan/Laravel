<?php

namespace App\Http\Livewire\Ref;

use Livewire\Component;
use App\Models\Reference;

class Table extends Component
{
    protected $listeners = [
        'ref-created' => '$refresh'
    ];

    public function render()
    {
        return view('livewire.ref.table', [
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
        
        $this->emit('ref-delete');
    }
}
