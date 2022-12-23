<?php

namespace App\Http\Controllers;

use App\Models\Reference;
use Illuminate\Http\Request;

class ReferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        return view('reference.index', [
            'refs' => Reference::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reference.create');
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

        return redirect('/dashboard/referensi')->with('success', 'Referensi berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Referensi  $referensi
     * @return \Illuminate\Http\Response
     */
    public function show(Referensi $referensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Referensi  $referensi
     * @return \Illuminate\Http\Response
     */
    public function edit(Referensi $referensi)
    {
        return view('dashboard.referensi.edit', [
            'ref'          => $referensi,            
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Referensi  $referensi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Referensi $referensi)
    {
        $validatedData = $request->validate([       
            'id_ref'            => 'required|size:3',
            'no_ref'            => 'required',
            'keterangan'        => 'required'         
        ]);

        $validatedData['keterangan2'] = $request->keterangan2;     

        Referensi::where('id', $referensi->id)
                ->update($validatedData);

        return redirect('/dashboard/referensi')->with('success', 'Referensi berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Referensi  $referensi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Referensi $referensi)
    {
        Referensi::destroy($referensi->id);
        return redirect('/dashboard/referensi')->with('success', 'Post has been deleted');
    }
}
