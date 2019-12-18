@extends('layouts.app')


@section('content')

		@if(Session::has('success'))
            <div class="alert alert-success" role="alert-success">
                {{ Session::get('success') }}
            </div>
        @endif

	<div class="card">
		<div class="card-header">Trashed Posts</div>
		<div class="card-body">
			<table class="table table-hover">				
				<thead class="thead-dark">
					<tr>
						<th>Image</th>
						<th>Title</th>
						<th>Restore</th>
						<th>Destroy</th>
					</tr>
				</thead>
				<tbody>
					@if($posts->count() > 0)
						@foreach($posts as $post)
						<tr>
							<td><img src="{{ $post->featured }}" alt="{{ $post->title }}" width="90px" height="50px" /></td>
							<td>{{ $post-> title }}</td>
							<td>
								<a class="btn btn-xs btn-info" href="{{ route('post.restore', ['id' => $post->id]) }}">
									Restore
								</a>
							</td>
							<td>
								<a class="btn btn-xs btn-danger" href="{{ route('post.kill', ['id' => $post->id]) }}">
									Delete Permanently
								</a>
							</td>
						</tr>
						@endforeach
					@else
						<tr>
							<td colspan="4" class="text-center">No trashed post</td>
						</tr>
					@endif
				</tbody>

			</table>
		</div>
	</div>

@stop