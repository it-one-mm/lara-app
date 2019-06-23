@extends('layouts.main')

@section('title', 'Edit Ticket | IT ONE')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1 class="text-center">Edit a Ticket</h1>
            <hr>

            @if(session('status'))
                <p class="aler alert-success">{{ session('status') }}</p>
            @endif()

            @foreach($errors->all() as $error)
                <p class="alert alert-danger">{{ $error }}</p>
            @endforeach

            <form method="post">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" class="form-control" value="{{ $ticket->title }}">
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea id="content" name="content" class="form-control">{{ $ticket->content }}</textarea>
                </div>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="status"
                        {{ $ticket->status ? '' : 'checked' }}>
                    <label class="form-check-label" for="exampleCheck1">Close this ticket?</label>
                </div>
                <input type="submit" class="btn btn-primary" value="Submit">
            </form>
        </div>
    </div>

@stop
