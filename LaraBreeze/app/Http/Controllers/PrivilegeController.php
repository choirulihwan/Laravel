<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Group;
use Illuminate\Http\Request;
use DB;

class PrivilegeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('privilege.index', [
            'collection'    => Group::orderBy('name')->paginate(),            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $group = Group::find($id);        
        return view('privilege.create', [
            'is_edit'   => true,  
            'group' => $group,  
            'menus' => Menu::all()->skip(1)        
            
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(!empty($request->menu)):
            DB::table('group_menus')->where('group_id', '=', $id)->delete();
            foreach($request->menu as $v):
                DB::table('group_menus')->insert(['group_id' => $id, 'menu_id' => $v]);
            endforeach;
        endif;

        if(!empty($request->module)):
            DB::table('group_modules')->where('group_id', '=', $id)->delete();
            foreach($request->module as $v):
                DB::table('group_modules')->insert(['group_id' => $id, 'module_id' => $v]);
            endforeach;
        endif;
        
        return redirect()->route('privilege.index')->with('message', 'Privelege Granted successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
