<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Settings;
use Session;

class SettingsController extends Controller
{
    
    public function __construct(){
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.settings.settings')->with('settings', Settings::first());
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        //
        //dd(request()->all());
        $this->validate(request(), [
            'site_name'     => 'required',
            'contact_number'     => 'required',
            'contact_email'     => 'required',
            'address'     => 'required'
        ]);

        $settings = Settings::first();
        $settings->site_name = request()->site_name;
        $settings->contact_number = request()->contact_number;
        $settings->contact_email = request()->contact_email;
        $settings->address = request()->address;

        $settings->save();

        Session::flash('success', 'Settings updated');
        return redirect()->back();

    }

    
}
