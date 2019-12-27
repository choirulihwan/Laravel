@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

	@if(count($errors) > 0)
		<ul class="list-group">
			@foreach($errors->all() as $error)
				<li class="list-group-item text-danger">
					{{ $error }}
				</li>
			@endforeach
		</ul>
	@endif

	<div class="card">
		<div class="card-header">Create new user</div>

		<div class="card-body">
			<form action="{{ route('user.store') }}" method="post" enctype="multipart/form-data">

				{{ csrf_field() }}

				<div class="form-group">					
					<label for="name">User</label>
					<input type="text" class="form-control" name="name">
				</div>

				<div class="form-group">					
					<label for="email">Email</label>
					<input type="text" class="form-control" name="email">
				</div>

				
				<div class="form-group">					
					<div class="text-center">
						<button class="btn btn-success" type="submit">Store user</button>
					</div>
				</div>				
				
			</form>
		</div>
	</div>
</div>
</div>
</div>
	
@stop