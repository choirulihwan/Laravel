@extends('layouts.app')

@section('content')

    @foreach($discussions as $d)

            <div class="panel panel-default">
                <div class="panel-heading">
                    <img src="{{ asset($d->user->avatar) }}" alt="" width="40px" height="40px" />
                    &nbsp;&nbsp;&nbsp;
                    <span>{{ $d->user->name }}, {{ $d->created_at->diffForHumans() }}</span>
                    
                    @if($d->hasBestAnswer())
                        <span class="btn btn-success pull-right btn-xs">Closed</span>
                    @else
                        <span class="btn btn-danger pull-right btn-xs">Open</span>
                    @endif

                    <a href="{{ route('discussion', ['slug' => $d->slug]) }}" class="btn btn-xs btn-default pull-right" style="margin-right: 3px;">View</a>
                </div>

                <div class="panel-body">

                    <h3 class="text-center">{{ $d->title }}</h3> 
                    
                    <p class="text-center">
                        {{ str_limit($d->content, 50) }}
                    </p> 
                    
                </div>

                <div class="panel-footer">
                    <span> {{ $d->replies->count() }} Replies</span>
                    <a href="{{ route('channel', ['slug' => $d->channel->slug]) }}" class="pull-right btn btn-default btn-xs">{{ $d->channel->title }}</a>
                </div>
            </div>

    @endforeach

    <div class="text-center">{{ $discussions->links() }}</div>

@endsection
