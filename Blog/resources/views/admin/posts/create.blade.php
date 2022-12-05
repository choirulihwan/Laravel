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
		<div class="card-header">Create new post</div>

		<div class="card-body">
			<form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">

				{{ csrf_field() }}

				<div class="form-group">					
					<label for="title">Title</label>
					<input type="text" class="form-control" name="title" value="{{ old('title') }}">
				</div>

				<div class="form-group">					
					<label for="featured">Category</label>
					<select name="category_id" id="category_id" class="form-control">
						@foreach($categories as $category)
							@if ($category->id == old('category_id'))
							<option value="{{ $category->id }}" selected>{{ $category->name }}</option>	
							@else
							<option value="{{ $category->id }}">{{ $category->name }}</option>	
							@endif							
						@endforeach
					</select>
				</div>

				<div class="form-group">
					<label for="tag">Select Tags</label>
					@foreach($tags as $key => $tag)
					<div class="checkbox">
						@if (old('tags.'.$key) == $tag->id)
						<label><input type="checkbox" name="tags[]" value="{{ $tag->id }}" checked> {{ $tag->tag }} </label>	
						@else
						<label><input type="checkbox" name="tags[]" value="{{ $tag->id }}"> {{ $tag->tag }} </label>
						@endif
						
					</div>
					@endforeach
				</div>	

				<div class="form-group">					
					<label for="category">Featured Image</label>
					<input type="file" class="form-control" name="featured">
				</div>

				<div class="form-group">					
					<label for="content">Content</label>
					<textarea class="form-control" name="content" id="content" cols="5" rows="20">{{ old('content') }}</textarea>
				</div>				

				<div class="form-group">					
					<div class="text-center">
						<button class="btn btn-success" type="submit">Save post</button>
					</div>
				</div>				
				
			</form>
		</div>
	</div>
</div>
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
  //console.log('loaded');
});
</script>
@stop