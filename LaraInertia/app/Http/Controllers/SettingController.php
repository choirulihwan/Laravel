<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function update(Request $request)
    {        
        auth()->user()->update([
            'default_lang'  => $request->input('lang')
        ]);        
        
    }
}
