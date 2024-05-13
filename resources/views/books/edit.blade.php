@extends('layouts.base')

@section('title', 'Edit Book')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center alert alert-success">Edit Book</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mx-3">
                <a href="{{ route('books.index') }}" class="btn btn-danger">Go List</a>
            </div>
        </div>
        <form action="{{ route('books.update', $book) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $book->title) }}" required>
            </div>
            <div class="form-group">
                <label for="author">Author</label>
                <input type="text" class="form-control" id="author" name="author" value="{{ old('author', $book->author) }}" required>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ old('price', $book->price) }}" required>
            </div>
            <div class="form-group">
                <label for="cover_image">Cover Image</label>
                <input type="file" class="form-control-file" id="cover_image" name="cover_image">
                <div class="shrink-0 my-2">
                    <img id="featured_image_preview" class="form-control" src="{{ isset($book) ? Storage::url($book->cover_image) : '' }}" alt="Featured image preview" />
                </div>
            </div>
            <div class="form-group">
                <label for="published_at">Published Date</label>
                <input type="date" class="form-control" id="published_at" name="published_at" value="{{ old('published_at', $book->published_at ? \Carbon\Carbon::parse($book->published_at)->format('Y-m-d') : '') }}">
            </div>
            <div class="form-group">
                <label for="category_id">Category</label>
                <select class="form-control" id="category_id" name="category_id">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $book->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
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
