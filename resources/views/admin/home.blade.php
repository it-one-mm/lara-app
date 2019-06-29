@extends('layouts.main')

@section('title', 'Admin Dashboard | IT ONE')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(session('status'))
                <p class="aler alert-success">{{ session('status') }}</p>
            @endif()

            <div class="card" style="margin: 16px 0;">
              <h4 class="card-header">Manage Users</h4>
              <div class="card-body">
                <a href="{{ route('admin.users.index') }}" class="btn btn-default">All Users</a>
              </div>
            </div>

            <div class="card" style="margin: 16px 0;">
              <h4 class="card-header">Manage Roles</h4>
              <div class="card-body">
                <a href="{{ route('admin.roles.index') }}" class="btn btn-default">All Roles</a>
                <a href="{{ route('admin.roles.create') }}" class="btn btn-primary">Create Role</a>
              </div>
            </div>

            <div class="card" style="margin: 16px 0;">
              <h4 class="card-header">Manage Posts</h4>
              <div class="card-body">
                <a href="#" class="btn btn-default">All Posts</a>
                <a href="#" class="btn btn-primary">Create Post</a>
              </div>
            </div>

        </div>
    </div>

@stop
