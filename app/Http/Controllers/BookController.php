<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('books.create', compact('categories'));
    }

    public function store(BookRequest $request)
    {
        $validated = $request->validated();
        if ($request->hasFile('cover_image')) {
            $filePath = Storage::disk('public')->put('images/cover_image', request()->file('cover_image'));
            $validated['cover_image'] = $filePath;
        }

        Book::create($validated);
        return redirect()->route('books.index')->with('success', 'Book created successfully.');
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        $categories = Category::all();
        return view('books.edit', compact('book', 'categories'));
    }

    public function update(BookRequest $request, Book $book)
    {
        $validated = $request->validated();

        if ($request->hasFile('cover_image')) {
            Storage::disk('public')->delete($book->cover_image);

            $filePath = Storage::disk('public')->put('images/cover_image', request()->file('cover_image'), 'public');
            $validated['cover_image'] = $filePath;
        }

        $book->update($validated);
        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }

    public function destroy(Book $book)
    {
        Storage::disk('public')->delete($book->cover_image);

        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }
}
