@extends('adminlte::page')

@section('title', 'Users Management')

@section('plugins.Datatables', true)

@section('content_header')
    <h1>Permission Management</h1>
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
                  <h3 class="card-title col-md-8">List Permission</h3>                
                @can('permission-create')
                  <div class="d-flex col-md-4 justify-content-end">
                    <a class="btn btn-success" href="{{ route('permissions.create') }}"><i class="fas fa-fw fa-plus"></i> Create</a>
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
                    <th>Guard Name</th>
                    
                    @can('user-edit', 'user-delete')
                      <th width="280px">Action</th>
                    @endcan
                  </tr>
              </thead>
              <tbody>
                @foreach ($data as $key => $permission)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $permission->name }}</td>
                <td>{{ $permission->guard_name }}</td>
               

                @can('permission-edit', 'permission-delete')
                  <td class="text-center">
                    @can('permission-edit')
                    <a class="btn btn-warning" href="{{ route('permissions.edit',$permission->id) }}"><i class="fas fa-fw fa-pen"></i> Edit</a>
                    @endcan
                    @can('permission-delete')
                      {!! Form::open(['method' => 'DELETE','route' => ['permissions.destroy', $permission->id],'style'=>'display:inline']) !!}
                          {{ Form::button('<i class="fas fa-fw fa-trash"></i> Delete', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => "return confirm('Are you sure?')"] )  }}
                      {!! Form::close() !!}
                    @endcan
                  </td>
                @endcan

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
@stop