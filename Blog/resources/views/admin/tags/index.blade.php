@extends('layouts.app')


@section('content')

		@if(Session::has('success'))
            <div class="alert alert-success" role="alert-success">
                {{ Session::get('success') }}
            </div>
        @endif

	<div class="card">
		<div class="card-header">Tags</div>
		<div class="card-body">			
			<table class="table table-hover">				
				<thead class="thead-dark">
					<tr>
						<th>Tag Name</th>
						<th>Edit</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>
					@if($tags->count() > 0)
						@foreach($tags as $tag)
						<tr>
							<td>{{ $tag->tag }}</td>
							<td>
								<a class="btn btn-xs btn-info" href="{{ route('tag.edit', ['id' => $tag->id]) }}">
									Edit
								</a>
							</td>
							<td>
								<a class="btn btn-xs btn-danger" href="{{ route('tag.delete', ['id' => $tag->id]) }}">
									Delete
								</a>
							</td>
						</tr>
						@endforeach
					@else
						<tr>
							<td colspan="3" class="text-center">No tags yet</td>
						</tr>
					@endif
				</tbody>

			</table>
		</div>
	</div>

@stop