@extends('layouts.main')

@section('title', 'All Tickets | IT ONE')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>All Tickets</h1>
            <hr>
            @if(session('status'))
                <p class="aler alert-success">{{ session('status') }}</p>
            @endif()
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tickets as $ticket)
                    <tr>
                        <th scope="row">{{ $ticket->id }}</th>
                        <td>
                            <a href="{{ action('TicketsController@show', ['slug' => $ticket->slug]) }}">{{ $ticket->title }}</a>
                        </td>
                        <td>{{ $ticket->status ? 'Opened' : 'Closed' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

@stop

