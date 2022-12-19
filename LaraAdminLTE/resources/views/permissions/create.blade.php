@extends('adminlte::page')

@section('title', 'Create permission')

@section('content_header')
    <h1>Permission Management</h1>
@stop

@section('content')

@if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
       @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
       @endforeach
    </ul>
  </div>
@endif

@if ($mode == 'edit')
    {!! Form::model($permission, ['method' => 'PATCH','route' => ['permissions.update', $permission->id]]) !!}
@else
    {!! Form::open(array('route' => 'permissions.store','method'=>'POST', 'class' => 'form form-horizontal form-bordered')) !!}    
@endif

<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">{{ $title }} permission</h3>
    </div>

    <div class="card-body">
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                {!! Form::text('name', ($mode == 'edit') ? $permission->name : old('name'), array('placeholder' => 'Name','class' => 'form-control', 'autofocus'=>'autofocus')) !!}
            </div>
        </div>
    </div>
    
    <div class="card-footer">
        <button type="submit" class="btn btn-primary"><i class="fas fa-fw fa-save"></i> Submit</button>
        <a class="btn btn-secondary float-right" href="{{ route('permissions.index') }}"><i class="fas fa-fw fa-minus-circle"></i> Cancel</a>
    </div>
</div>
{!! Form::close() !!}

@endsection