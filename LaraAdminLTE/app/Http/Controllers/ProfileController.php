<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        return view('profile.index');
    }

    //update password
    public function update(Request $request)
    {
        $request->validate([
            'old_password' => ['required', new MatchOldPassword],
            'password' => 'required|min:6',
            'confirm-password' => 'same:password',
        ]);
        
        auth()->user()->update(['password'  => bcrypt($request->input('password'))]);        

        return redirect()->route('profile')->with('success', 'Password changed successfully');
    }

}
