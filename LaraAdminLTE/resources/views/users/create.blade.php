@extends('adminlte::page')

@section('title', 'Create User')

@section('content_header')
    <h1>{{ __('user.user') }}</h1>
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
    {!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}
@else
    {!! Form::open(array('route' => 'users.store','method'=>'POST', 'class' => 'form form-horizontal form-bordered')) !!}    
@endif

<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">{{ __('global.'.$mode) }} {{ __('user.user') }}</h3>
    </div>

    <div class="card-body">
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">{{ __('user.name') }}</label>
            <div class="col-sm-10">
                {!! Form::text('name', ($mode == 'edit') ? $user->name : old('name'), array('placeholder' => 'Name','class' => 'form-control', 'autofocus'=>'autofocus')) !!}
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                {!! Form::email('email', ($mode == 'edit') ? $user->email : old('email'), array('placeholder' => 'Email','class' => 'form-control')) !!}
            </div>
        </div>

        {{-- <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
            </div>
        </div>

        <div class="form-group row">
            <label for="confirm-password" class="col-sm-2 col-form-label">{{ __('user.confirm_pass') }}</label>
            <div class="col-sm-10">
                {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
            </div>
        </div> --}}

        <div class="form-group row">
            <label for="roles" class="col-sm-2 col-form-label">{{ __('user.role') }}</label>
            <div class="col-sm-10">
                {!! Form::select('roles[]', $roles, ($mode == 'edit') ? $userRole : old('roles'),  array('class' => 'form-control','multiple')) !!}
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