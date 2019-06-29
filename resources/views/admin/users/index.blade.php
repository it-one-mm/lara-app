@extends('layouts.main')

@section('title', 'All Users | IT ONE')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>All Users</h1>
            <hr>
            @if(session('status'))
                <p class="aler alert-success">{{ session('status') }}</p>
            @endif()
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Roles</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>
                            {{ $user->name }}
                        </td>
                        <td><a href="{{ route('admin.users.edit', $user->id) }}">{{ $user->email }}</a></td>
                        <td>{{ implode(", ", $user->roles()->pluck('name')->all()) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

@stop
