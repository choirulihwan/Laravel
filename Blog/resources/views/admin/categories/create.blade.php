@extends('layouts.app')

@section('content')

	@include('admin.includes.errors')

	<div class="panel panel-default">
		<div class="panel-heading">
			<h2 class="text-center">Create new category</h2>	
		</div>

		<div class="panel-body">
			<form action="{{ route('category.store') }}" method="post">

				{{ csrf_field() }}

				<div class="form-group">					
					<label for="name">Name</label>
					<input type="text" class="form-control" name="name">
				</div>

				
				<div class="form-group">					
					<div class="text-center">
						<button class="btn btn-success" type="submit">Store category</button>
					</div>
				</div>				
				
			</form>
		</div>
	</div>
	
@stop