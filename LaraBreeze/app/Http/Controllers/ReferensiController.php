<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Referensi;
use App\Imports\ReferensiImport;
use Maatwebsite\Excel\Facades\Excel;

class ReferensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('referensi.index', [
            'collection'    => Referensi::orderBy('id_ref')->paginate()
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('referensi.create', [
            'is_edit' => false
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreReferensiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $data = $request->validate([
            'id_ref'  => 'required|size:3',
            'no_ref'  => 'required',
            'keterangan'  => 'required'
        ]);

        Referensi::create([
            'id_ref'    => $data['id_ref'],
            'no_ref'    => $data['no_ref'],
            'keterangan'=> $data['keterangan'],
            'keterangan_label'  => $request['keterangan_label'],
        ]);

        return redirect()->route('referensi.index')->with('message', 'Referensi created successfully');
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
        return view('referensi.create', [
            'is_edit'   => true,
            'referensi'     => $referensi
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReferensiRequest  $request
     * @param  \App\Models\Referensi  $referensi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Referensi $referensi)
    {
        $data = $request->validate([
            'id_ref'  => 'required|size:3',
            'no_ref'  => 'required',
            'keterangan'  => 'required'
        ]);


        $referensi->id_ref = $data['id_ref']; 
        $referensi->no_ref = $data['no_ref']; 
        $referensi->keterangan = $data['keterangan']; 
        $referensi->keterangan_label = $request['keterangan_label']; 

        $referensi->save();

        return redirect()->route('referensi.index')->with('message', 'Referensi saved successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Referensi  $referensi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Referensi $referensi)
    {
        $referensi->delete();
        return redirect()->route('referensi.index')->with('message', 'Referensi deleted successfully');
    }

    //my function
    public function importcsv()
    {
        return view('referensi.importcsv');
    }

    public function importcsv_action(Request $request)
    {
        Excel::import(new ReferensiImport, $request->file('file_ref'));
        return redirect()->route('referensi.index')->with('message', 'Referensi berhasil diimport');
    }

}
