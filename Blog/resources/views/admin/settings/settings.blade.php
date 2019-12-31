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
		<div class="card-header">Edit site settings</div>

		<div class="card-body">
			<form action="{{ route('settings.update') }}" method="post">

				{{ csrf_field() }}

				<div class="form-group">					
					<label for="site_name">Site name</label>
					<input type="text" class="form-control" name="site_name" value="{{ $settings->site_name }}">
				</div>

				<div class="form-group">					
					<label for="contact_number">Contact number</label>
					<input type="text" class="form-control" name="contact_number" value="{{ $settings->contact_number }}">
				</div>

				<div class="form-group">					
					<label for="contact_email">Contact email</label>
					<input type="email" class="form-control" name="contact_email" value="{{ $settings->contact_email }}">
				</div>

				<div class="form-group">					
					<label for="address">Address</label>
					<input type="text" class="form-control" name="address" value="{{ $settings->address }}">
				</div>

				<div class="form-group">					
					<div class="text-center">
						<button class="btn btn-success" type="submit">Update setting</button>
					</div>
				</div>				
				
			</form>
		</div>
	</div>
</div>
</div>
</div>
	
@stop