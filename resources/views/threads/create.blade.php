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
                            <label for="title"></label>
                            <input type="text" id="title" name="title" class="form-control" placeholder="Title...">
                        </div>

                        <div class="form-group">
                            <label for="body"></label>
                            <textarea name="body" id="body" cols="30" rows="10" class="form-control" placeholder="Body..."></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Publish</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
