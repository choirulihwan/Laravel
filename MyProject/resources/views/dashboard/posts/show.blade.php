@extends('dashboard.layouts.main')

@section('container')
<div class="container my-3">
    <div class="row">
        <div class="col-sm-8">
            <h2>{{ $posts->title }}</h2>
            
            <a href="/dashboard/posts" class="btn btn-sm btn-success"> <span data-feather="arrow-left-circle" class="align-text-bottom"></span> Back to all posts</a>
            <a href="/dashboard/posts/{{ $posts->slug }}/edit" class="btn btn-sm btn-warning"> <span data-feather="edit" class="align-text-bottom"></span> Edit</a>
            
            <form action="/dashboard/posts/{{ $posts->slug }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-sm btn-danger border-0" onclick="return confirm('Are you sure?')"><span data-feather="x-circle" class="align-text-bottom"></span> Delete</button>                          
              </form>
            
            @if ($posts->image)
              <div style="max-height:400;overflow-hidden">
                <img src="{{ asset('storage/'.$posts->image) }}" class="img-fluid mt-3 rounded" alt="{{ $posts->category->name }}">
              </div>                
            @else
                <img src="https://source.unsplash.com/800x400/?{{ $posts->category->name }}" class="img-fluid mt-3 rounded" alt="{{ $posts->category->name }}">
            @endif
            
            
            <article class="my-3">
                {!! $posts->content !!}
            </article>
            <hr/>
            <p>Category:  <a class="text-decoration-none" href="/posts?category={{ $posts->category->slug }}"> {{ $posts->category->name }} </a></p>
        </div>
    </div>
</div>
@endsection

