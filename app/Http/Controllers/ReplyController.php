<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thread;

class ReplyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * @param $channelId
     * @param App\Thread $thread
     */
    public function store(Request $request, $channelId, Thread $thread)
    {
        $request->validate([
            'body' => 'required'
        ]);

        $thread->addReply([
           'body' => request('body'),
           'user_id' => auth()->id()
        ]);

        return back();
    }
}
