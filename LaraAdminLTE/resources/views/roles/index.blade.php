@extends('adminlte::page')

@section('title', 'Roles Management')

@section('plugins.Datatables', true)

@section('content_header')
    <h1>Roles Management</h1>
@stop

@section('js')
    <script> 
      $(document).ready( function () {
        $('#myTable').DataTable();
      });
    </script>
@stop


@section('content')
<div class="container-fluid">
        
    @if ($message = Session::get('success'))
      <x-adminlte-alert theme="success" title="Success" dismissable>
        {{ $message }}
      </x-adminlte-alert>
    @endif
    
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            
              <h3 class="card-title col-md-8">List Roles</h3>
            
            @can('role-create')
              <div class="d-flex col-md-4 justify-content-end">
                <a class="btn btn-success" href="{{ route('roles.create') }}"><i class="fas fa-fw fa-plus"></i> Create</a>
              </div>
            @endcan
          </div>
          
          <div class="card-body">              
          <div class="row">
            <div class="col-sm-12">
            <table id="myTable" class="table table-striped dataTable dtr-inline" aria-describedby="example1_info">
            <thead>
              <tr class="table-primary">
                <th>No</th>
                <th>Name</th>                
                <th width="280px">Action</th>
              </tr>
          </thead>
          <tbody>
            @foreach ($roles as $key => $role)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $role->name }}</td>
            <td class="text-center">
                @can('role-edit')
                    <a class="btn btn-warning" href="{{ route('roles.edit',$role->id) }}"><i class="fas fa-fw fa-pen"></i> Edit</a>
                @endcan
                @can('role-delete')
                    {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}                    
                        {{ Form::button('<i class="fas fa-fw fa-trash"></i> Delete', ['type' => 'submit', 'class' => 'btn btn-danger'] ) }}
                    {!! Form::close() !!}
                @endcan
            </td>
          </tr>
         @endforeach
          </tbody>
          <tfoot></tfoot>
          </table>
          </div>
          
          </div>
          </div>
        </div>
    </div>
</div>
@endsection