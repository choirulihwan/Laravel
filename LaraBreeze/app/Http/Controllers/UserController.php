<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Group;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.index', [
            'collection'    => User::orderBy('name')->paginate()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create', [
            'is_edit'   => false,
            'groups'    => Group::orderBy('name')->get()
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
            'email'  => 'email|unique:users',
            'group_id'  => 'required|numeric'
        ]);

        User::create([
            'name'  => $data['name'],
            'email'  => $data['email'],
            'group_id'  => $data['group_id'],
            'password'  => bcrypt('password')
        ]);

        return redirect()->route('user.index')->with('message', 'User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('user.create', [
            'is_edit'   => true,
            'user'     => $user,
            'groups'    => Group::orderBy('name')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name'  => 'required|min:5',            
            'group_id'  => 'required|numeric'
        ]);

        if($user->email != $request->email):
            $request->validate(['email'  => 'email|unique:users']);
        endif;
        
        $data['email'] = $request->email;

        $user->name = $data['name']; 
        $user->email = $data['email']; 
        $user->group_id = $data['group_id']; 
        $user->save();

        return redirect()->route('user.index')->with('message', 'User saved successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with('message', 'User deleted successfully');
    }
}
