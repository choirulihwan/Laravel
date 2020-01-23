@extends('layouts.app')

@section('content')

            <div class="panel panel-default">
                <div class="panel-heading">
                    <img src="{{ asset($d->user->avatar) }}" alt="" width="40px" height="40px" />
                    &nbsp;&nbsp;&nbsp;
                    <span>{{ $d->user->name }}, <strong>({{ $d->user->points }})</strong> {{ $d->created_at->diffForHumans() }}</span>                     

                    @if($d->hasBestAnswer())
                        <span class="btn btn-success pull-right btn-xs">Closed</span>
                    @else
                        <span class="btn btn-danger pull-right btn-xs">Open</span>
                    @endif

                    @if(Auth::id() == $d->user->id)
                        <a href="{{ route('discussion.edit', ['slug' => $d->slug]) }}" class="btn btn-xs btn-primary pull-right" style="margin-right:8px;">Edit</a>
                    @endif

                    @if($d->is_being_watched_by_auth_user())                    
                        <a href="{{ route('discussion.unwatch', ['id' => $d->id]) }}" class="btn btn-xs btn-danger pull-right" style="margin-right:8px;">Unwatch</a>
                    @else
                        <a href="{{ route('discussion.watch', ['id' => $d->id]) }}" class="btn btn-xs btn-default pull-right" style="margin-right:8px;">Watch</a>
                    @endif
                </div>

                <div class="panel-body">

                    <h3 class="text-center">{{ $d->title }}</h3> 
                    
                    <p class="text-center">
                        <strong>{{ $d->content }}</strong>
                    </p> 

                    <hr/>
                    
                    @if($best_answer)
                    <div class="text-center" style="padding: 20px;">
                        <h3 class="text-center">Best Answer</h3>
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <img src="{{ asset($best_answer->user->avatar) }}" alt="" width="40px" height="40px" />
                                <span>{{ $best_answer->user->name }}, <strong>({{ $best_answer->user->points }})</strong></span>
                            </div>
                            <div class="panel-body">
                                {{ $best_answer->content }}
                            </div>
                        </div>
                    </div>
                    @endif
                    
                </div>

                <div class="panel-footer">
                    <p>{{ $d->replies->count() }} Replies</p>
                </div>
            </div>


            <!--replies-->
            @foreach($d->replies as $r)

            @if(!$r->best_answer)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <img src="{{ asset($r->user->avatar) }}" alt="" width="40px" height="40px" />
                    &nbsp;&nbsp;&nbsp;
                    <span>{{ $r->user->name }}, <strong>({{ $r->user->points }})</strong> {{ $r->created_at->diffForHumans() }}</span>  

                    @if(!$best_answer)
                        @if(Auth::id() == $d->user->id)
                            <a href="{{ route('discussion.best.answer', ['id' => $r->id]) }}" class="btn btn-xs btn-info">Mark as best answer</a>
                        @endif                  
                    @endif
                </div>

                <div class="panel-body">

                    <p class="">
                        {{ $r->content }}
                    </p> 
                    
                </div>

                <div class="panel-footer">
                    @if($r->is_liked_by_auth_user())
                        <a href="{{ route('reply.unlike', ['id' => $r->id])}}" class="btn btn-danger btn-xs">Unlike <span class="badge">{{ $r->likes->count() }}</span></a>
                    @else
                        <a href="{{ route('reply.like', ['id' => $r->id])}}" class="btn btn-success btn-xs">Like <span class="badge">{{ $r->likes->count() }}</span></a>
                    @endif
                </div>
            </div>
            @endif
            @endforeach

            <div class="panel panel-default">
                <div class="panel-body">
                    @if(Auth::check())
                    <form action="{{ route('discussion.reply', ['id' => $d->id]) }}" method="post">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="reply">Leave a reply...</label>
                            <textarea name="reply" id="reply" cols="30" rows="10" class="form-control"></textarea>
                        </div>

                        <div class="form-group">
                            <button class="btn pull-right">Leave a reply</button>
                        </div>
                    </form>
                    @else
                        <div class="text-center"><h2>Sign in to leave reply</h2></div>
                    @endif
                </div>
            </div>

@endsection
