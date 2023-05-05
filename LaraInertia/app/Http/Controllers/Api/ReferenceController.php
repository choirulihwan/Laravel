<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Reference;
use App\Http\Resources\ReferenceResource;

class ReferenceController extends Controller
{
    public function index() {
        $ref = Reference::latest()->paginate(5);
        return new ReferenceResource(true, 'List Reference', $ref);
    }

    public function store(Request $request)
    {       
        
        $validator = Validator::make($request->all(), [ 
            'id_ref'            => 'required|size:3',
            'no_ref'            => 'required',
            'keterangan'        => 'required',  
            'keterangan2'       => 'required'           
        ]);   

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $ref = Reference::create(
            [ 
                'id_ref'            => $request->id_ref,
                'no_ref'            => $request->no_ref,
                'keterangan'        => $request->keterangan, 
                'keterangan2'       => $request->keterangan2, 
            ]
        );

        return new ReferenceResource(true, 'Data Referensi Berhasil Ditambahkan!', $ref);
        
    }

    public function show(Reference $ref) 
    {
        return new ReferenceResource(true, 'Data Post Ditemukan!', $ref);
    }

    public function update(Request $request, Reference $ref)
    {
        $validator = Validator::make($request->all(), [ 
            'id_ref'            => 'required|size:3',
            'no_ref'            => 'required',
            'keterangan'        => 'required',  
            'keterangan2'       => 'required'           
        ]);   

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $ref->update(
            [ 
                'id_ref'            => $request->id_ref,
                'no_ref'            => $request->no_ref,
                'keterangan'        => $request->keterangan, 
                'keterangan2'       => $request->keterangan2, 
            ]
        );

        return new ReferenceResource(true, 'Data Referensi Terupdate!', $ref);
    }

    public function destroy(Reference $ref)
    {
        $ref->delete();
        return new ReferenceResource(true, 'Data Referensi Dihapus!', $ref);
    }    
    
}
