@extends('layouts.main')

@section('title', 'Create a Role | IT ONE')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1 class="text-center">Create a Role</h1>
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
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="form-control">
                </div>
                <input type="submit" class="btn btn-block btn-primary" value="Create">
            </form>
        </div>
    </div>

@stop
