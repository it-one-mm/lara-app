@extends('layouts.main')

@section('title', 'Edit User | IT ONE')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1 class="text-center">Edit User</h1>
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
                    <input type="text" id="name" name="name" class="form-control" value="{{ $user->name }}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ $user->email }}">
                </div>
                <div class="form-group">
                  <label for="">Select Role</label>
                  <select class="form-control" name="role[]" multiple>
                    @foreach ($roles as $role)
                      <option value="{{ $role->id }}" {{ in_array($role->name, $selectedRoles) ? 'selected' : '' }}>
                        {{ $role->name }}
                      </option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                </div>
                <input type="submit" class="btn btn-block btn-primary" value="Update">
            </form>
        </div>
    </div>

@stop
