@extends('layouts.app')

@section('content')

            <div class="panel panel-default">
                <div class="panel-heading">
                    <img src="{{ asset($d->user->avatar) }}" alt="" width="40px" height="40px" />
                    &nbsp;&nbsp;&nbsp;
                    <span>{{ $d->user->name }}, {{ $d->created_at->diffForHumans() }}</span>
                    
                    @if($d->is_being_watched_by_auth_user())
                    
                        <a href="{{ route('discussion.unwatch', ['id' => $d->id]) }}" class="btn btn-xs btn-danger pull-right">Unwatch</a>

                    @else

                        <a href="{{ route('discussion.watch', ['id' => $d->id]) }}" class="btn btn-xs btn-default pull-right">Watch</a>

                    @endif;
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

            <div class="panel panel-default">
                <div class="panel-heading">
                    <img src="{{ asset($r->user->avatar) }}" alt="" width="40px" height="40px" />
                    &nbsp;&nbsp;&nbsp;
                    <span>{{ $r->user->name }}, {{ $r->created_at->diffForHumans() }}</span>  

                    @if(!$best_answer)
                        <a href="{{ route('discussion.best.answer', ['id' => $r->id]) }}" class="btn btn-xs btn-info">Mark as best answer</a>                  
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
