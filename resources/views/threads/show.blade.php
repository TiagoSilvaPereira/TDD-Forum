@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default mb-3">
                <div class="card-header">
                    <a href="#">{{ $thread->creator->name }}</a> posted: 
                    <b>{{ $thread->title }}</b>
                </div>

                <div class="card-body">
                    {{ $thread->body }}
                </div>
            </div>
        </div>
    </div>
    
    @foreach($thread->replies as $reply)
        @include('threads.reply')
    @endforeach

    @auth
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default mb-3">
                <div class="card-header">
                    Send Reply...
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('threads.store.reply', [$thread->channel->slug, $thread->id]) }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <textarea name="body" id="" cols="30" rows="10" class="form-control" autofocus placeholder="Have something to say?"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endauth

    @guest
        <div class="row justify-content-center">
            <p>Please <a href="{{ route('login') }}">sign in</a> to participate in this discussion.</p>
        </div>
    @endguest

</div>
@endsection
