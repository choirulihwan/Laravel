<?php

namespace App\Http\Livewire\Ref;

use Livewire\Component;
use App\Models\Reference;

class Create extends Component
{
    public $id_ref;
    public $no_ref;
    public $keterangan;
    public $keterangan2;
    public $editState = false;
    public $refs;

    protected $listeners = [
        'ref-edit' => 'edit',
        'ref-delete'    => 'delete'
    ];

    protected $rules = [
        'id_ref' => 'required|size:3',
        'no_ref' => 'required',
        'keterangan'    => 'required'
    ];

    public function render()
    {
        return view('livewire.ref.create');
    }

    public function store() 
    {        
        $this->validate();

        Reference::create([
            'id_ref' => $this->id_ref,
            'no_ref' => $this->no_ref,
            'keterangan' => $this->keterangan,
            'keterangan2' => $this->keterangan2,
        ]);        

        $this->reset_input();

        session()->flash('message', 'Reference inserted.');
    }

    public function edit($id)
    {        
        $ref = Reference::find($id);
        $this->id_ref = $ref->id_ref;
        $this->no_ref = $ref->no_ref;
        $this->keterangan = $ref->keterangan;
        $this->keterangan2 = $ref->keterangan2;
        $this->editState = true;
        $this->refs = $ref;
    }

    public function update($id) {
        
        $this->validate();

        $ref = Reference::find($id);
        $ref->id_ref = $this->id_ref;
        $ref->no_ref = $this->no_ref;
        $ref->keterangan = $this->keterangan;
        $ref->keterangan2 = $this->keterangan2;
        $ref->save();   
        
        $this->reset_input();
        session()->flash('message', 'Reference updated.');
    }

    public function delete() {
        session()->flash('message', 'Reference deleted.');
    }

    public function reset_input() 
    {
        $this->id_ref = '';
        $this->no_ref = '';
        $this->keterangan = '';
        $this->keterangan2 = '';
        $this->emit('ref-created');

        $this->editState = false;
    }
}
