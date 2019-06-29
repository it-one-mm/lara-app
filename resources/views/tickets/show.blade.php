@extends('layouts.main')

@section('title', 'Single Ticket | IT ONE')

@section('content')

    <div class="row justify-content-center" style="margin: 16px 0;">
        <div class="col-md-8">

            <div class="card" style="margin-top: 16px;">
                <h2 class="card-header">{{ $ticket->title }}</h2>
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p><strong>Status:</strong> {{ $ticket->status ? 'Opened' : 'Closed' }}</p>
                    <p class="card-text">{{ $ticket->content }}</p>
                    <a href="{{ route('admin.tickets.edit', $ticket->slug) }}" class="btn btn-primary">Edit</a>
                    <a class="btn btn-danger" href="#"
                       onclick="javascript: event.preventDefault(); document.getElementById('delete-form').submit();">Delete</a>

                    <form action="{{ route('admin.tickets.destroy', $ticket->slug) }}" method="post" id="delete-form" style="display: none;">
                        @csrf
                        @method('delete')

                    </form>
                </div>
            </div>

            @foreach($comments as $comment)
            <div class="card" style="margin: 16px 0;">
                <div class="card-body">
                   {{ $comment->content }}
                </div>
            </div>
            @endforeach

            <div class="card">
                <h5 class="card-header">Reply</h5>
                <div class="card-body">
                    @if(session('status'))
                        <p class="aler alert-success">{{ session('status') }}</p>
                    @endif()
                    <form action="{{ action('CommentsController@newComment') }}" method="post">
                        @csrf
                        <input type="hidden" name="post_id" value="{{ $ticket->id }}">
                        <div class="form-group">
                            <textarea name="content" class="form-control" cols="30" rows="5"></textarea>
                        </div>
                        <input type="reset" class="btn btn-light" value="Cancel">
                        <input type="submit" class="btn btn-primary" value="Post">
                    </form>
                </div>
            </div>

        </div>
    </div>

@stop


