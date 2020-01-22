<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Discussion;
use App\Reply;
use App\User;
use Session;
use Auth;
use Notification;

class DiscussionsController extends Controller
{
    //
    public function create()
    {
    	return view('discuss');
    }

    public function store()
    {
    	//dd(request());
    	$r = request();

    	$this->validate($r, [
    		'channel_id'	=> 'required',
    		'title'			=> 'required',
    		'content'		=> 'required'
    	]);

    	$discussion = Discussion::create([
    		'title'			=> $r->title,
    		'content'		=> $r->content,
    		'channel_id'	=> $r->channel_id,
    		'user_id'		=> Auth::id(),
    		'slug'			=> str_slug($r->title)
    	]);

    	Session::flash('success', 'Discussion successfully created');
    	return redirect()->route('discussion', ['slug' => $discussion->slug]);
    }

    public function show($slug)
    {
    	
    	return view('discussions.show')->with('d', Discussion::where('slug', $slug)->first());
    }

    public function reply($id)
    {

        $d = Discussion::find($id);

        $watchers = [];
        foreach($d->watchers as $watcher):
            array_push($watchers, User::find($watcher->user_id));
        endforeach;

        $reply = Reply::create([
            'user_id'       => Auth::id(),
            'discussion_id' => $id,
            'content'       => request()->reply
        ]);


        //dd($watchers);
        Notification::send($watchers, new \App\Notifications\NewReplyAdded($d));

        Session::flash('success', 'Replied to discussion');
        return redirect()->back();
        
    }
}
