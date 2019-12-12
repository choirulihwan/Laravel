<?php

namespace App\Http\Controllers;

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

    	return redirect()->back();
    }

    public function delete($id) {
    	$todo = Todo::find($id);
    	$todo->delete();
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

    	return redirect()->route('todos');

    }
}
