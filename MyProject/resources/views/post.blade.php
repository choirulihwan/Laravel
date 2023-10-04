{{-- @dd($posts); --}}
@extends('layouts.main')

@section('container')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <h2>{{ $posts->title }}</h2>
                <p> By: <a href="/authors/{{ $posts->author->username }}" class="text-decoration-none"> {{ $posts->author->name }} </a> 
                    in <a class="text-decoration-none" href="/posts?category={{ $posts->category->slug }}"> {{ $posts->category->name }} </a>
                </p>
                
                @if ($posts->image)
                <div style="max-height:400;overflow-hidden">
                    <img src="{{ asset('storage/'.$posts->image) }}" class="img-fluid" alt="{{ $posts->category->name }}">
                </div>                
                @else                    
                    <img src="https://source.unsplash.com/800x400/?{{ $posts->category->name }}" class="img-fluid" alt="{{ $posts->category->name }}">
                @endif
                
                
                <article class="my-3">
                    {!! $posts->content !!}
                </article>
                
                <p>
                    <a href="/posts" class="text-decoration-none">Back to posts</a>
                </p>
            </div>
        </div>
    </div>

@endsection
