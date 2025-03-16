@extends('layouts.master')

@section('title', 'Edit Book')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header bg-warning">✏ Edit Book</div>
        <div class="card-body">
            <form action="{{ route('books.update', $book->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>Title</label>
                    <input type="text" name="title" value="{{ old('title', $book->title) }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Author</label>
                    <input type="text" name="author" value="{{ old('author', $book->author) }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Published Year</label>
                    <input type="number" name="published_year" value="{{ old('published_year', $book->published_year) }}" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-success w-100">💾 Update Book</button>
            </form>
        </div>
    </div>
</div>
@endsection
