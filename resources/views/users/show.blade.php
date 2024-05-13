@extends('layouts.app')

@section('title', 'Show User')

@section('content')
    <div class="container">
        <h2 class="mb-4">User Details</h2>
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <p>{{ $user->name }}</p>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <p>{{ $user->email }}</p>
                </div>
                <div class="form-group">
                    <label for="created_at">Created At:</label>
                    <p>{{ $user->created_at }}</p>
                </div>
                <div class="form-group">
                    <label for="updated_at">Updated At:</label>
                    <p>{{ $user->updated_at }}</p>
                </div>
                <a href="{{ route('users.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
@endsection
