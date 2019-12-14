@extends('layouts.app')

@section('content')

	@if(count($errors) > 0)
		<ul class="list-group">
			@foreach($errors->all() as $error)
				<li class="list-group-item text-danger">
					{{ $error }}
				</li>
			@endforeach
		</ul>
	@endif

	<div class="panel panel-default">
		<div class="panel-heading">
			<h2 class="text-center">Create new post</h2>	
		</div>

		<div class="panel-body">
			<form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">

				{{ csrf_field() }}

				<div class="form-group">					
					<label for="title">Title</label>
					<input type="text" class="form-control" name="title">
				</div>

				<div class="form-group">					
					<label for="featured">Featured Image</label>
					<input type="file" class="form-control" name="featured">
				</div>	

				<div class="form-group">					
					<label for="content">Content</label>
					<textarea class="form-control" name="content" id="content" cols="5" rows="5"></textarea>
				</div>				

				<div class="form-group">					
					<div class="text-center">
						<button class="btn btn-success" type="submit">Store post</button>
					</div>
				</div>				
				
			</form>
		</div>
	</div>
	
@stop