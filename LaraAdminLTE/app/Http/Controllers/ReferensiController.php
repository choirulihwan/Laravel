<?php

namespace App\Http\Controllers;

use App\Models\Referensi;
use Illuminate\Http\Request;

class ReferensiController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ref-list|ref-create|ref-edit|ref-delete', ['only' => ['index','store']]);
         $this->middleware('permission:ref-create', ['only' => ['create','store']]);
         $this->middleware('permission:ref-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:ref-delete', ['only' => ['destroy']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        return view('referensi.index', [
            'refs' => Referensi::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create';
        $mode = 'create';
        return view('referensi.create', compact('title', 'mode'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([       
            'id_ref'            => 'required|size:3',
            'no_ref'            => 'required',
            'keterangan'        => 'required'         
        ]);

        $validatedData['keterangan2'] = $request->keterangan2;        

        Referensi::create($validatedData);
        
        return redirect()->route('refs.index')->with('success', 'insert_success');
    }

   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Referensi  $referensi
     * @return \Illuminate\Http\Response
     */
    public function edit(Referensi $ref)
    {
        $title = 'Edit';
        $mode = 'edit';
        
        return view('referensi.create', compact('ref','title', 'mode')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Referensi  $referensi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Referensi $ref)
    {
       
        $validatedData = $request->validate([       
            'id_ref'            => 'required|size:3',
            'no_ref'            => 'required',
            'keterangan'        => 'required'         
        ]);

        $validatedData['keterangan2'] = $request->keterangan2;             
        Referensi::where('id', $ref->id)->update($validatedData);       
        
        return redirect()->route('refs.index')->with('success', 'update_success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Referensi  $referensi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Referensi $ref)
    {
        Referensi::destroy($ref->id);
        return redirect()->route('refs.index')->with('success', 'delete_success');
    }
}
