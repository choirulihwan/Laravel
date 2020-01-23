@extends('layouts.app')

@section('content')

            <div class="panel panel-warning">
                <div class="panel-heading">Create new discussion</div>

                <div class="panel-body">
                    <form action="{{ route('discussions.store') }}" method="post">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}" />
                        </div>

                        <div class="form-group">
                            <label for="channel">Pick a channel</label>
                            <select name="channel_id" class="form-control">
                                @foreach($channels as $channel)
                                    <option value="{{ $channel->id }}">{{ $channel->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">                            
                            <label for="content">Ask your question</label>
                            <textarea name="content" id="content" cols="30" rows="8" class="form-control">{{ old('content') }}</textarea>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-success pull-right" type="submit">Create discussion</button>
                        </div>

                    </form>
                </div>
            </div>
        
@endsection
