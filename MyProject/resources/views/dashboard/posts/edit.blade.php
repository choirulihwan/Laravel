@extends('dashboard.layouts.main')

@section('container')
<style>
    trix-toolbar [data-trix-button-group="file-tools"] {
      display: none;
    }
</style>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Post</h1>        
    </div> 

    <div class="col-lg-8">
    <form method="POST" class="mb-5" action="/dashboard/posts/{{ $post->slug }}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" required value="{{ old('title', $post->title) }}"> 
          @error('title') 
            <div class="invalid-feedback">
                {{ $message }}
            </div>          
          @enderror         
        </div>

        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="slug" name="slug" class="form-control-plaintext" id="slug" readonly value="{{ old('slug', $post->slug) }}">      
              
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
                <select class="form-select @error('category_id') is-invalid @enderror" name="category_id" id="category_id" required>
                    <option value="" selected>Open this select menu</option>
                    @foreach ($categories as $category)
                        @if (old('category_id', $post->category_id) == $category->id)
                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                        @else
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                        
                    @endforeach
                </select>  
                @error('category_id') 
                <div class="invalid-feedback">
                    {{ $message }}
                </div>          
                @enderror          
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Post Image</label>
            <input type="hidden" name="oldImage" value="{{ $post->image }}"> 
            @if ($post->image)
                <img src="{{ asset('storage/'.$post->image) }}" class="img-preview img-fluid mb-3 rounded col-sm-10 d-flex">
            @else
                <img class="img-preview img-fluid mb-3 rounded col-sm-10">
            @endif
            
            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
            @error('image') 
            <div class="invalid-feedback">
                {{ $message }}
            </div>          
            @enderror  
        </div>


        <div class="mb-3">
            <label for="body" class="form-label">Content</label>
            @error('content')              
                <p class="text-danger">{{ $message }}</p>            
            @enderror
            <input id="body" type="hidden" name="content" value="{{ old('content', $post->content) }}">
            <trix-editor input="body"></trix-editor>
        </div>        

        <button type="submit" class="btn btn-primary">Update Post</button>
      </form>
    </div>

    <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        title.addEventListener('change', function() {
            fetch('/dashboard/posts/checkSlug?title=' + title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });

        document.addEventListener('trix-file-accept', function(e) {
            e.preventEventDefault();
        });

        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const ofReader = new FileReader();
            ofReader.readAsDataURL(image.files[0])

            ofReader.onload = function (e) {
                imgPreview.src = e.target.result;
            }
        }
    </script>
@endsection

