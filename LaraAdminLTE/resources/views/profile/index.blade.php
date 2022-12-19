@extends('adminlte::page')

@section('title', 'Change password')

@section('content_header')
    <h1>Change password</h1>
@stop

@section('content')

@if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br>
    <ul>
       @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
       @endforeach
    </ul>
  </div>
@endif

@if ($message = Session::get('success'))          
    <x-adminlte-alert theme="success" title="Success" dismissable>
    {{ $message }}
    </x-adminlte-alert>
@endif


<form action="{{ route('profile.update') }}" method="post">
@method('PUT')
@csrf
<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Change password</h3>
    </div>

    <div class="card-body">
        
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Current Password</label>
            <div class="col-sm-10">
                {!! Form::password('old_password', array('placeholder' => 'Password','class' => 'form-control', 'autofocus' => 'autofocus')) !!}
            </div>
        </div>

        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">New Password</label>
            <div class="col-sm-10">
                {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
            </div>
        </div>

        <div class="form-group row">
            <label for="confirm-password" class="col-sm-2 col-form-label">Confirm Password</label>
            <div class="col-sm-10">
                {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
            </div>
        </div>

        
    </div>
    
    <div class="card-footer">
        <button type="submit" class="btn btn-primary"><i class="fas fa-fw fa-save"></i> Submit</button>
        <a class="btn btn-secondary float-right" href="{{ route('users.index') }}"><i class="fas fa-fw fa-minus-circle"></i> Cancel</a>
    </div>
</div>
</form>

@endsection