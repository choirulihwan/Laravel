@extends('adminlte::page')

@section('title', 'Create User')

@section('content_header')
    <h1>{{ __('ref.ref') }}</h1>
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
    {!! Form::model($ref, ['method' => 'PATCH','route' => ['refs.update', $ref->id]]) !!}
@else
    {!! Form::open(array('route' => 'refs.store','method'=>'POST', 'class' => 'form form-horizontal form-bordered')) !!}    
@endif

<div class="card card-info">
  <div class="card-header">
    <h3 class="card-title">{{ __('global.'.$mode) }} {{ __('ref.ref') }}</h3>
  </div> 
    
  <div class="card-body">
    <div class="form-group row">
      <label for="id_ref" class="col-sm-2 col-form-label">{{ __('ref.group') }} {{ __('ref.ref') }}</label>
      <div class="col-sm-10">
        <input type="text" name="id_ref" class="form-control @error('id_ref') is-invalid @enderror" id="id_ref" value="{{ ($mode == 'edit') ? $ref->id_ref : old('id_ref') }}" autofocus required>
      </div>
      @error('id_ref') 
        <div class="invalid-feedback">
            {{ $message }}
        </div>          
      @enderror  
    </div>

    <div class="form-group row">
      <label for="no_ref" class="col-sm-2 col-form-label">{{ __('ref.no_ref') }}</label>
      <div class="col-sm-10">
        <input type="text" name="no_ref" class="form-control @error('no_ref') is-invalid @enderror" id="no_ref" value="{{ ($mode == 'edit') ? $ref->no_ref : old('no_ref') }}" required>
      </div>
      @error('no_ref') 
        <div class="invalid-feedback">
            {{ $message }}
        </div>          
      @enderror 
    </div>

    <div class="form-group row">
      <label for="keterangan" class="col-sm-2 col-form-label">{{ __('ref.label') }}</label>
      <div class="col-sm-10">
        <input type="text" name="keterangan" class="form-control  @error('keterangan') is-invalid @enderror" id="keterangan" value="{{ ($mode == 'edit') ? $ref->keterangan : old('keterangan') }}" required>
      </div>
      @error('keterangan') 
        <div class="invalid-feedback">
            {{ $message }}
        </div>          
      @enderror
    </div>

    <div class="form-group row">
      <label for="keterangan2" class="col-sm-2 col-form-label">{{ __('ref.label_group') }}</label>
      <div class="col-sm-10">
        <input type="text" name="keterangan2" class="form-control" id="keterangan2" value="{{ ($mode == 'edit') ? $ref->keterangan2 : old('keterangan2') }}">
      </div>
    </div>
        
    <div class="card-footer">
      <button type="submit" class="btn btn-primary"><i class="fas fa-fw fa-save"></i> {{ __('global.save') }}</button>
      <a class="btn btn-secondary float-right" href="{{ route('refs.index') }}"><i class="fas fa-fw fa-minus-circle"></i> {{ __('global.cancel') }}</a>
  </div>
  </div>
</div>

{!! Form::close() !!}
@endsection

