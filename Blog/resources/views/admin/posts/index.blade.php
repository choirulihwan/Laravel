@extends('layouts.app')


@section('content')

		@if(Session::has('success'))
            <div class="alert alert-success" role="alert-success">
                {{ Session::get('success') }}
            </div>
        @endif

	<div class="card">
		<div class="card-body">
			<table class="table table-hover">
				
				<thead>
					<tr>
						<th>Image</th>
						<th>Title</th>
						<th>Edit</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>
					@foreach($posts as $post)
					<tr>
						<td><img src="{{ $post->featured }}" alt="{{ $post->title }}" width="90px" height="50px" /></td>
						<td>{{ $post-> title }}</td>
						<td>
							<a class="btn btn-xs btn-info" href="{{ route('post.edit', ['id' => $post->id]) }}">
								Edit
							</a>
						</td>
						<td>
							<a class="btn btn-xs btn-danger" href="{{ route('post.delete', ['id' => $post->id]) }}">
								Delete
							</a>
						</td>
					</tr>
					@endforeach
				</tbody>

			</table>
		</div>
	</div>

@stop