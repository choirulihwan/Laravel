@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Role Management</h2>
        </div>
        <div class="d-flex justify-content-end mb-3">
        @can('role-create')
            <a class="btn btn-success" href="{{ route('roles.create') }}"><i class="bi bi-bag-plus-fill"></i> Create New Role</a>
        @endcan
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif


<table class="table table-bordered table-striped">
    <thead>
  <tr class="table-dark text-center">
     <th width="80px">No</th>
     <th>Name</th>
     <th width="280px">Action</th>
  </tr>
</thead>
<tbody>
    @foreach ($roles as $key => $role)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $role->name }}</td>
        <td class="text-center">
            <a class="btn btn-info btn-sm" href="{{ route('roles.show',$role->id) }}"><i class="bi bi-eye-fill"></i> Show</a>
            @can('role-edit')
                <a class="btn btn-warning btn-sm" href="{{ route('roles.edit',$role->id) }}"><i class="bi bi-pencil-fill"></i> Edit</a>
            @endcan
            @can('role-delete')
                {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                    {{-- {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!} --}}
                    {{ Form::button('<i class="bi bi-trash2-fill"></i> Delete', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm'] ) }}
                {!! Form::close() !!}
            @endcan
        </td>
    </tr>
    @endforeach
</tbody>
</table>


{!! $roles->render() !!}



@endsection