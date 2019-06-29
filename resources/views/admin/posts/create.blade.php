@extends('layouts.main')

@section('title', 'Create Post | IT ONE')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1 class="text-center">Create Post</h1>
            <hr>

            @if(session('status'))
                <p class="aler alert-success">{{ session('status') }}</p>
            @endif()

            @foreach($errors->all() as $error)
                <p class="alert alert-danger">{{ $error }}</p>
            @endforeach

            <form method="post">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" class="form-control">
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea id="content" name="content" class="form-control"></textarea>
                </div>
                <input type="submit" class="btn btn-primary" value="Submit">
            </form>
        </div>
    </div>

@stop
