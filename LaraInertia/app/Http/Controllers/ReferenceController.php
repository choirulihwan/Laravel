<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Reference;
use Illuminate\Http\Request;

class ReferenceController extends Controller
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
        $refs = Reference::paginate(10);        
        return Inertia::render('Reference/Index', [
            'refs'  => $refs
        ]);        
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

        Reference::create($validatedData);

        return redirect()->back()->with('message', 'Reference Created');
    }

   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Referensi  $referensi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reference $reference)
    {
        $validatedData = $request->validate([       
            'id_ref'            => 'required|size:3',
            'no_ref'            => 'required',
            'keterangan'        => 'required'         
        ]);

        $validatedData['keterangan2'] = $request->keterangan2;     

        $reference->update($validatedData);

        return redirect()->back()->with('message', 'Reference updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Referensi  $referensi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reference $reference)
    {
        $reference->delete();
        return redirect()->back()->with('message', 'Reference has been deleted');
    }
}
