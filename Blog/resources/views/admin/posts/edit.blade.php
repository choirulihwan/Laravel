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

	<div class="card">
		<div class="card-header">
			<h2 class="text-center">Edit a post: {{ $post->title }}</h2>	
		</div>

		<div class="card-body">
			<form action="{{ route('post.update', ['id' => $post->id]) }}" method="post" enctype="multipart/form-data">

				{{ csrf_field() }}

				<div class="form-group">					
					<label for="title">Title</label>
					<input type="text" class="form-control" name="title" value="{{ $post->title }}">
				</div>

				<div class="form-group">					
					<label for="featured">Category</label>
					<select name="category_id" id="category_id" class="form-control">
						@foreach($categories as $category)
							<option value="{{ $category->id }}"

								@if($post->category->id == $category->id)
									 selected
								@endif
								
							>{{ $category->name }}</option>
						@endforeach
					</select>
				</div>	

				<div class="form-group">
					<label for="tag">Select Tags</label>
					@foreach($tags as $tag)
					<div class="checkbox">
						<label><input type="checkbox" name="tags[]" value="{{ $tag->id }}"

							@foreach($post->tags as $t)
								@if($t->id == $tag->id)
									 checked
								@endif
							@endforeach


						> {{ $tag->tag }} </label>
					</div>
					@endforeach
				</div>

				<div class="form-group">					
					<label for="category">Featured Image</label>
					<input type="file" class="form-control" name="featured">
				</div>

				<div class="form-group">					
					<label for="content">Content</label>
					<textarea class="form-control" name="content" id="content" cols="5" rows="5">{{ $post->content }}</textarea>
				</div>				

				<div class="form-group">					
					<div class="text-center">
						<button class="btn btn-success" type="submit">Update post</button>
					</div>
				</div>				
				
			</form>
		</div>
	</div>
	
@stop


@section('styles')
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
@stop



@section('scripts')
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
<script>
$(document).ready(function() {
  $('#content ').summernote();  
});
</script>
@stop