@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Users Management</h2>
        </div>
        @can('user-create')
        <div class="d-flex justify-content-end mb-3">
            <a class="btn btn-success" href="{{ route('users.create') }}"><i class="bi bi-bag-plus-fill"></i> Create New User</a>
        </div>
        @endcan
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
   <th>No</th>
   <th>Name</th>
   <th>Email</th>
   <th>Roles</th>
   <th width="280px">Action</th>
 </tr>
</thead>
<tbody>
 @foreach ($data as $key => $user)
  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td>      
      @if(!empty($user->getRoleNames()))
        @foreach($user->getRoleNames() as $v)
           <label class="badge bg-success">{{ $v }}</label>           
        @endforeach
      @endif
    </td>
    <td class="text-center">
      <a class="btn btn-sm btn-info" href="{{ route('users.show',$user->id) }}"><i class="bi bi-eye-fill"></i> Show</a>
      @can('user-edit')
       <a class="btn btn-sm btn-warning" href="{{ route('users.edit',$user->id) }}"><i class="bi bi-pencil-fill"></i> Edit</a>
      @endcan
      @can('user-delete')
        {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
            {{-- {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!} --}}
            {{ Form::button('<i class="bi bi-trash2-fill"></i> Delete', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm'] )  }}
        {!! Form::close() !!}
      @endcan
    </td>
  </tr>
 @endforeach
</tbody>
</table>


{!! $data->render() !!}

@endsection