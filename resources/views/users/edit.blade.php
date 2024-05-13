@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center alert alert-success">Edit User</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mx-3">
                <a href="{{ route('users.index') }}" class="btn btn-danger">Go List</a>
            </div>
        </div>
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            @if($errors->any())
                <div class="col-12 mt-2">
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
            <button type="submit" class="btn btn-success">Update User</button>
        </form>
    </div>
@endsection
