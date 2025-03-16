@extends('layouts.master')

@section('title', 'My Books')

@section('content')
<div class="container">
    <h2 class="text-center my-4">📚 My Books</h2>

    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <a href="{{ route('books.create') }}" class="btn btn-primary mb-3">➕ Add Book</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Published Year</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->published_year }}</td>
                    <td>
    <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm">✏ Edit</a>

    <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete()">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm">🗑 Delete</button>
    </form>
</td>

                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">No books found. Add some!</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
<script>
    function confirmDelete() {
        return confirm("⚠ Are you sure you want to delete this book? This action cannot be undone.");
    }
</script>
@endsection
