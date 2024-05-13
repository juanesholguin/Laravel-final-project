@extends('layouts.base')

@section('title', 'Show book')

@section('content')
    <div class="container">
        <h2 class="mb-4">Book Details</h2>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $book->title }}</h5>
                <p class="card-text"><strong>Author:</strong> {{ $book->author }}</p>
                <p class="card-text"><strong>Price:</strong> ${{ $book->price }}</p>
                <p class="card-text"><strong>Category:</strong> {{ $book->category->name }}</p>
                <p class="card-text"><strong>Published
                        Date:</strong> {{ old('published_at', $book->published_at ? \Carbon\Carbon::parse($book->published_at)->format('Y-m-d') : '') }}</p>
                @if ($book->cover_image)
                    <div class="mb-3">
                        <strong>Cover Image:</strong><br>
                        <img src="{{ Storage::url($book->cover_image) }}" alt="Cover Image" class="img-fluid">
                    </div>
                @endif
                <a href="{{ route('books.index') }}" class="btn btn-secondary">Back</a>

            </div>
        </div>
    </div>
@endsection
