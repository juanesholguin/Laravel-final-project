@extends('layouts.app')

@section('title', 'Show book')

@section('content')
    <div class="container">
        <h2 class="mb-4">Category Details</h2>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $category->name }}</h5>
                <p class="card-text"><strong>Description:</strong> {{ $category->description }}</p>
                <p class="card-text"><strong>Priority:</strong> {{ $category->priority }}</p>

                <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
@endsection
