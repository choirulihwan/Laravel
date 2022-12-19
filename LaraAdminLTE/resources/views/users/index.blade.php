@extends('adminlte::page')

@section('title', 'Users Management')

@section('plugins.Datatables', true)

@section('content_header')
    <h1>Users Management</h1>
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
                
                  <h3 class="card-title col-md-8">List Users</h3>
                
                @can('user-create')
                  <div class="d-flex col-md-4 justify-content-end">
                    <a class="btn btn-success" href="{{ route('users.create') }}"><i class="fas fa-fw fa-plus"></i> Create</a>
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
                    <th>Email</th>
                    <th>Roles</th>
                    @can('user-edit', 'user-delete')
                      <th width="280px">Action</th>
                    @endcan
                  </tr>
              </thead>
              <tbody>
                @foreach ($data as $key => $user)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>      
                  @if(!empty($user->getRoleNames()))
                    @foreach($user->getRoleNames() as $v)
                       <label class="badge bg-success">{{ $v }}</label>           
                    @endforeach
                  @endif
                </td>

                @can('user-edit', 'user-delete')
                  <td class="text-center">
                    {{-- <a class="btn btn-info" href="{{ route('users.show',$user->id) }}"><i class="fas fa-fw fa-eye"></i> Show</a> --}}
                    @can('user-reset')
                      {!! Form::open(['method' => 'PUT','route' => ['users.reset', $user->id],'style'=>'display:inline']) !!}                          
                          {{ Form::button('<i class="fas fa-fw fa-share-square"></i>', ['type' => 'submit', 'class' => 'btn btn-primary', 'onclick' => "return confirm('Are you sure?')"] )  }}
                      {!! Form::close() !!}
                    @endcan
                    @can('user-edit')
                      <a class="btn btn-warning" href="{{ route('users.edit',$user->id) }}"><i class="fas fa-fw fa-pen"></i></a>
                    @endcan
                    @can('user-delete')
                      {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
                          {{-- {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!} --}}
                          {{ Form::button('<i class="fas fa-fw fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => "return confirm('Are you sure?')"] )  }}
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