@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Create a new Thread</div>

                <div class="card-body">
                    <form action="{{ route('threads.store') }}" method="POST">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="title">Choose a Channel</label>
                            <select name="channel_id" id="channel" class="form-control" required>
                                <option value="">Choose One...</option>
                                @foreach($channels as $channel)
                                    <option value="{{ $channel->id }}" {{ old('channel_id') == $channel->id ? 'selected' : '' }} >
                                        {{ $channel->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" id="title" name="title" value="{{ old('title') }}" class="form-control" placeholder="Title..." required>
                        </div>

                        <div class="form-group">
                            <label for="body">Body</label>
                            <textarea name="body" id="body" cols="30" rows="10" class="form-control" placeholder="Body..." required>{{ old('body') }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Publish</button>
                    </form>

                    @if(count($errors))
                        <div class="mt-3">
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger">{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
