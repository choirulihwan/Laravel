@extends('layouts.app')


@section('content')

		@if(Session::has('success'))
            <div class="alert alert-success" role="alert-success">
                {{ Session::get('success') }}
            </div>
        @endif

	<div class="card">
		<div class="card-header">Users</div>
		<div class="card-body">
			
			<table class="table table-hover">				
				<thead class="thead-dark">
					<tr>
						<th>Image</th>
						<th>Name</th>
						<th>Permissions</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>
					@if($users->count() > 0)
						@foreach($users as $user)
						<tr>
							<td><img src="{{ asset($user->profile->avatar) }}" style="border-radius: 50%" width="60px" height="60px" /></td>
							<td>{{ $user-> name }}</td>
							<td>
								@if($user->admin)
									<a href="{{ route('user.not-admin', ['id' => $user->id]) }}" class="btn btn-xs btn-danger">Remove permission</a>
								@else
									<a href="{{ route('user.admin', ['id' => $user->id]) }}" class="btn btn-xs btn-success">Make Admin</a>
								@endif
							</td>
							<td>
								Delete
							</td>
						</tr>
						@endforeach
					@else
						<tr>
							<td colspan="4" class="text-center">No users</td>
						</tr>
					@endif
				</tbody>

			</table>
		</div>
	</div>

@stop
