<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('module.index', [
            'collection'    => Module::orderBy('menu_id', 'desc')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('module.create', [
            'is_edit'   => false,
            'menu'    => Menu::all()
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
        $data = $request->validate([
            'name'  => 'required|min:5',
            'label'  => 'required',
            'link'  => 'required|min:5',
            'menu_id'  => 'required|numeric',
            'is_active' => 'required|boolean'
        ]);

        Module::create($data);            

        return redirect()->route('module.index')->with('message', 'Module created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function show(Module $module)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function edit(Module $module)
    {
        return view('module.create', [
            'is_edit'   => true,
            'menu'    => Menu::all(),
            'module'    => $module,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Module $module)
    {
        $data = $request->validate([
            'name'  => 'required|min:5',
            'label'  => 'required',
            'link'  => 'required|min:5',
            'menu_id'  => 'required|numeric',
            'is_active' => 'required|boolean'
        ]);

        $module->save($data);

        return redirect()->route('module.index')->with('message', 'Module saved successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function destroy(Module $module)
    {
        $module->delete();
        return redirect()->route('module.index')->with('message', 'Module deleted successfully');
    }
}
