@extends('layouts.app')


@section('content')

		@if(Session::has('success'))
            <div class="alert alert-success" role="alert-success">
                {{ Session::get('success') }}
            </div>
        @endif

	<div class="card">
		<div class="card-header">Categories</div>
		<div class="card-body">			
			<table class="table table-hover">				
				<thead class="thead-dark">
					<tr>
						<th>Category Name</th>
						<th>Edit</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>
					@if($categories->count() > 0)
						@foreach($categories as $category)
						<tr>
							<td>{{ $category-> name }}</td>
							<td>
								<a class="btn btn-xs btn-info" href="{{ route('category.edit', ['id' => $category->id]) }}">
									Edit
								</a>
							</td>
							<td>
								<a class="btn btn-xs btn-danger" href="{{ route('category.delete', ['id' => $category->id]) }}">
									Delete
								</a>
							</td>
						</tr>
						@endforeach
					@else
						<tr>
							<td colspan="3" class="text-center">No categories yet</td>
						</tr>
					@endif
				</tbody>

			</table>
		</div>
	</div>

@stop