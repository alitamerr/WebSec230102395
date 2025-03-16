<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;


class BookController extends Controller
{
    /**
     * Show all books owned by the authenticated user.
     */
    public function index()
{
    $books = \App\Models\Book::where('user_id', Auth::id())->get(); // ✅ Correct way to fetch books
    return view('books.index', compact('books'));
}


    /**
     * Show form to create a new book.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a new book in the database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'published_year' => 'required|integer|digits:4',
        ]);

        Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'published_year' => $request->published_year,
            'user_id' => Auth::id(), // Associate book with the logged-in user
        ]);

        return redirect()->route('books.index')->with('status', 'Book added successfully!');
    }

    /**
     * Show form to edit an existing book.
     */
    public function edit(Book $book)
{
    return view('books.edit', compact('book')); // ✅ Pass book data to view
}


    /**
     * Update a book in the database.
     */
    public function update(Request $request, Book $book)
    {
        if (Auth::id() !== $book->user_id) {
            abort(403, 'Unauthorized');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'published_year' => 'required|integer|digits:4',
        ]);

        $book->update($request->all());

        return redirect()->route('books.index')->with('status', 'Book updated successfully!');
    }

    /**
     * Delete a book.
     */
    public function destroy(Book $book)
    {
        if (Auth::id() !== $book->user_id) {
            abort(403, 'Unauthorized');
        }

        $book->delete();
        return redirect()->route('books.index')->with('status', 'Book deleted successfully!');
    }
}
