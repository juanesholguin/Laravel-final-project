@extends('layouts.app')

@section('title', 'Edit Category')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center alert alert-success">Edit category</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mx-3">
                <a href="{{ route('categories.index') }}" class="btn btn-danger">Go List</a>
            </div>
        </div>
        <form action="{{ route('categories.update', $category) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $category->name) }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $category->description) }}</textarea>
            </div>
            <div class="form-group">
                <label for="priority">Priority</label>
                <input type="number" class="form-control" id="priority" name="priority" value="{{ old('priority', $category->priority) }}" required>
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
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
