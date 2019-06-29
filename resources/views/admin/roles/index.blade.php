@extends('layouts.main')

@section('title', 'All Roles | IT ONE')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>All Roles</h1>
            <hr>
            @if(session('status'))
                <p class="aler alert-success">{{ session('status') }}</p>
            @endif()
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roles as $role)
                    <tr>
                        <th scope="row">{{ $role->name }}</th>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

@stop
