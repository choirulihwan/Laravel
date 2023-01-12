@extends('adminlte::page')

@section('title', 'Create User')

@section('content_header')
    <h1>{{ __('role.role') }}</h1>
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
    {!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
@else    
    {!! Form::open(array('route' => 'roles.store','method'=>'POST', 'class' => 'form form-horizontal form-bordered')) !!}
@endif

<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">{{ __('global.'.$mode) }} {{ __('role.role') }}</h3>
    </div>

    <div class="card-body">
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">{{ __('role.name') }}</label>
            <div class="col-sm-10">
                {!! Form::text('name', ($mode == 'edit') ? $role->name : old('name'), array('placeholder' => 'Name','class' => 'form-control', 'autofocus'=>'autofocus')) !!}
            </div>
        </div>

        <div class="form-group row">
            <label for="permission" class="col-sm-2 col-form-label">{{ __('role.permission') }}</label>
            <div class="col-sm-10">
                @foreach($permission as $value)                        
                        <label>{{ Form::checkbox('permission[]', $value->id, ($mode == 'edit') ? (in_array($value->id, $rolePermissions) ? true : false) : false , array('class' => 'name')) }} &nbsp; {{ $value->name }}</label>
                    <br/>
                @endforeach
            </div>
        </div>
    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary"><i class="fas fa-fw fa-save"></i> {{ __('global.save') }}</button>
        <a class="btn btn-secondary float-right" href="{{ route('users.index') }}"><i class="fas fa-fw fa-minus-circle"></i> {{ __('global.cancel') }}</a>
    </div>
</div>

{!! Form::close() !!}

@endsection