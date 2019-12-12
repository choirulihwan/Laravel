@extends('layout')

@section('content')
    
    <div class="row">
        <div class="col-lg-12">
            <form action="{{ route('todo.save', ['id' => $todos->id]) }}" method="post">
                {{ csrf_field () }}
                <input type="text" class="form-control input-lg text-center" name="todo" value="{{ $todos->todo }}" />
            </form>
        </div>
    </div>
    <hr />
    
@stop