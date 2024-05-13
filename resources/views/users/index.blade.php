@extends('layouts.app')
@section('title', 'Users list')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center alert alert-success">Users</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="col-12">
                    <a href="{{ route('users.create') }}" class="btn btn-primary">Create new Users</a>
                    <a href="{{ route('home') }}" class="btn btn-warning">Back to Home</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="card-body">
                @if ($users->isEmpty())
                    <p>No users found.</p>
                @else
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <a href="{{ route('users.show', $user->id) }}" class="btn btn-info btn-sm">View</a>
                                    <a href="{{ route('users.edit', $user->id) }}"
                                       class="btn btn-primary btn-sm">Edit</a>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                          style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure?')">Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
@endsection
