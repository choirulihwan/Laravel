<?php

namespace App\Http\Controllers;

use Session;
use App\Todo;
use Illuminate\Http\Request;

class TodosController extends Controller
{
    //
    public function index(){
    	$todos = Todo::all();

    	return view('todos')->with('todos', $todos);
    }

    public function store(Request $req) {
    	//dd($req->all());

    	$todo = new Todo;
    	$todo->todo = $req->todo;
    	$todo->save();

        Session::flash('success', 'Your todo is created');

    	return redirect()->back();
    }

    public function delete($id) {
    	$todo = Todo::find($id);
    	$todo->delete();

        Session::flash('success', 'Your todo is deleted');
    	return redirect()->back();
    }

    public function update($id) {
    	$todo = Todo::find($id);
    	
    	return view('update')->with('todos', $todo);
    }

    public function save(Request $req, $id){
    	$todo = Todo::find($id);
    	$todo->todo = $req->todo;
    	$todo->save();

        Session::flash('success', 'Your todo is updated');
    	return redirect()->route('todos');
    }

    public function completed($id) {
        $todo = Todo::find($id);
        $todo->completed = 1;
        $todo->save();

        Session::flash('success', 'Your todo is completed');
        return redirect()->back();
    }
}
