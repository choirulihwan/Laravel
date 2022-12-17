@extends('layouts.app')


@section('content')
<div class="row mb-3">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Create New User</h2>
        </div>
        <div class="d-flex justify-content-end">
            <a class="btn btn-secondary" href="{{ route('users.index') }}"><i class="bi bi-arrow-left-circle-fill"></i> Back</a>
        </div>
    </div>
</div>


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



{!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
<div class="row mb-3">
    <label for="name" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-4">
        {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
    </div>

    <label for="email" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-4">
        {!! Form::email('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
    </div>
</div>

<div class="row mb-3">
    <label for="name" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-4">
        {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
    </div>

    <label for="email" class="col-sm-2 col-form-label">Confirm Password</label>
    <div class="col-sm-4">
        {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
    </div>
</div>

<div class="row mb-3">
    <label for="name" class="col-sm-2 col-form-label">Role</label>
    <div class="col-sm-10">
        {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
    </div>    
</div>

    <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-3">
        <button type="submit" class="btn btn-primary"><i class="bi bi-save-fill"></i> Submit</button>
    </div>
{{-- </div> --}}
{!! Form::close() !!}



@endsection