@extends('layouts.main')

@section('container')
    <h1>About me</h1>
    <h2>{{ $name }}</h2>
    <h3>{{ $email }}</h3>
    <img src="image/{{ $image }}" width="200" class="img-thumbnail rounded-circle" />
@endsection
