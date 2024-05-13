@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center alert alert-success">Home</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-md-6">
                <h2>Categorías</h2>
                <a href="{{ route('categories.index') }}" class="btn btn-primary btn-sm btn-block mb-3">Manage Categories</a>
                <ul>
                    @foreach ($categories as $category)
                        <li>{{ $category->name }}</li>
                    @endforeach
                </ul>
            </div>

            <div class="col-xs-12 col-md-6">
                <h2>Libros Disponibles</h2>
                <a href="{{ route('books.index') }}" class="btn btn-primary btn-sm btn-block mb-3">Manage books</a>

                <div class="row">
                    @foreach ($books as $book)
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $book->title }}</h5>
                                    <p class="card-text">Autor: {{ $book->author }}</p>
                                    <p class="card-text">Precio: {{ $book->price }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
