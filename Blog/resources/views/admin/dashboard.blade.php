@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header bg-primary text-center">PUBLISHED</div>

                <div class="card-body">
                    <h1 class="text-center">{{ $posts_count }}</h1>

                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-header bg-danger text-white text-center">TRASHED</div>

                <div class="card-body">
                
                    <h1 class="text-center">{{ $trashed_count }}</h1>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-header bg-success text-white text-center">USERS</div>

                <div class="card-body">
                
                    <h1 class="text-center">{{ $users_count }}</h1>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-header bg-warning  text-center">CATEGORIES</div>

                <div class="card-body">
                
                    <h1 class="text-center">{{ $categories_count }}</h1>
                </div>
            </div>
        </div>

    </div>
</div>




@endsection
