@extends('layouts.master')

@section('title', 'Add New Book')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header bg-primary text-white">➕ Add Book</div>
        <div class="card-body">
            <form action="{{ route('books.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Author</label>
                    <input type="text" name="author" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Published Year</label>
                    <input type="number" name="published_year" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-success w-100">💾 Save Book</button>
            </form>
        </div>
    </div>
</div>
@endsection
