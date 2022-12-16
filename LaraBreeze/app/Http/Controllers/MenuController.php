<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('menu.index', [
            'collection'    => Menu::orderBy('menu_id')->orderBy('menu_order')->paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('menu.create', [
            'is_edit'   => false,
            'parent'    => Menu::where('menu_id', null)->get()
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
            'link'  => 'required',
            'urutan'  => 'required|numeric'
        ]);

        Menu::create([
            'name'  => $data['name'],
            'link'  => $data['link'],
            'icon'  => $request->icon,
            'is_active' => $request->is_active,
            'menu_id'   => ($request->parent == '-') ? null : $request->parent,
            'menu_order'  => $data['urutan'],            
        ]);

        return redirect()->route('menu.index')->with('message', 'Menu created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        return view('menu.create', [
            'is_edit'   => true,
            'menu'     => $menu,
            'parent'    => Menu::where('menu_id', null)->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $data = $request->validate([
            'name'  => 'required|min:5',
            'link'  => 'required',
            'urutan'  => 'required|numeric'
        ]);

        $menu->name = $data['name']; 
        $menu->link = $data['link']; 
        $menu->icon = $request->icon; 
        $menu->is_active = $request->is_active; 
        $menu->menu_id = ($request->parent == '-') ? null : $request->parent; 
        $menu->menu_order = $data['urutan']; 
        
        $menu->save();

        return redirect()->route('menu.index')->with('message', 'Menu saved successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect()->route('menu.index')->with('message', 'Menu deleted successfully');
    }
}
