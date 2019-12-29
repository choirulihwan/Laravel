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
		<div class="card-header">Edit your profile</div>

		<div class="card-body">
			<form action="{{ route('user.profile.update') }}" method="post" enctype="multipart/form-data">

				{{ csrf_field() }}

				<div class="form-group">					
					<label for="name">Username</label>
					<input type="text" class="form-control" name="name" value="{{ $user->name }}">
				</div>

				<div class="form-group">					
					<label for="email">Email</label>
					<input type="email" class="form-control" name="email" value="{{ $user->email }}">
				</div>

				<div class="form-group">					
					<label for="password">New password</label>
					<input type="password" class="form-control" name="password">
				</div>

				<div class="form-group">					
					<label for="avatar">Upload new avatar</label>
					<input type="file" class="form-control" name="avatar">
				</div>

				<div class="form-group">					
					<label for="facebook">Facebook profile</label>
					<input type="text" class="form-control" name="facebook" value="{{ $user->profile->facebook }}">
				</div>

				<div class="form-group">					
					<label for="youtube">Youtube profile</label>
					<input type="text" class="form-control" name="youtube" value="{{ $user->profile->youtube }}">
				</div>

				<div class="form-group">					
					<label for="about">About you</label>
					<textarea name="about" cols="6" rows="6" class="form-control">{{ $user->profile->about }}</textarea>
				</div>

				
				<div class="form-group">					
					<div class="text-center">
						<button class="btn btn-success" type="submit">Update profile</button>
					</div>
				</div>				
				
			</form>
		</div>
	</div>
</div>
</div>
</div>
	
@stop