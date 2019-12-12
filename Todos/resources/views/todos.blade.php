@extends('layout')

@section('content')
    
    <div class="row">
        <div class="col-lg-12">
            <form action="/create/todo" method="post">
                {{ csrf_field () }}
                <input type="text" class="form-control input-lg text-center" name="todo" placeholder="Create new todo" />
            </form>
        </div>
    </div>
    <hr />
    <div class="row"> 
        <div class="col-lg-12">
            @foreach($todos as $todo)
                {{ $todo->todo }} 
                <a href="{{ route('todo.delete', ['id' => $todo->id]) }}" class="btn btn-danger"> delete </a>
                <a href="{{ route('todo.update', ['id' => $todo->id]) }}" class="btn btn-warning"> update </a>
                <hr/>
            @endforeach
        </div>
    </div>
@stop