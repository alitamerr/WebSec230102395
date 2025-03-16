@extends('layouts.master')

@section('title', 'Add New Grade')

@include('grades.navbar')

@section('content')

<style>
    body {
        background-color: #f8f9fa;
        transition: 0.3s;
    }
    .grade-container {
        max-width: 600px;
        margin: 50px auto;
        padding: 20px;
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }
    .dark-mode {
        background-color: #1e1e1e;
        color: #f8f9fa;
    }
    .dark-mode .grade-container {
        background: #2c2c2c;
        color: #ffffff;
    }
    .btn-toggle {
        position: fixed;
        top: 10px;
        right: 20px;
    }
</style>

<!-- Dark Mode Button -->
<button class="btn btn-dark btn-toggle" onclick="toggleDarkMode()">🌙</button>

<div class="container">
    <div class="grade-container">
        <h2 class="text-center mb-3">📘 Add New Grade</h2>
        <p class="text-center text-muted">Fill in the details below to add a new grade</p>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('grades.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="course_code" class="form-label">📌 Course Code</label>
                <input type="text" id="course_code" name="course_code" class="form-control" placeholder="E.g., CS101" required>
            </div>

            <div class="mb-3">
                <label for="course_name" class="form-label">📖 Course Name</label>
                <input type="text" id="course_name" name="course_name" class="form-control" placeholder="E.g., Introduction to Programming" required>
            </div>

            <div class="mb-3">
                <label for="credit_hours" class="form-label">⏳ Credit Hours</label>
                <input type="number" id="credit_hours" name="credit_hours" class="form-control" min="1" max="6" placeholder="Enter credit hours" required>
            </div>

            <div class="mb-3">
                <label for="grade" class="form-label">🎓 Grade</label>
                <select id="grade" name="grade" class="form-select">
                    <option value="A">A</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B">B</option>
                    <option value="B-">B-</option>
                    <option value="C+">C+</option>
                    <option value="C">C</option>
                    <option value="C-">C-</option>
                    <option value="D+">D+</option>
                    <option value="D">D</option>
                    <option value="F">F</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="term" class="form-label">📆 Term</label>
                <input type="number" id="term" name="term" class="form-control" min="1" placeholder="Enter term number" required>
            </div>

            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary w-100">💾 Save Grade</button>
                <a href="{{ route('grades.index') }}" class="btn btn-secondary w-100 mt-2">🔙 Cancel</a>
            </div>
        </form>
    </div>
</div>

<script>
    function toggleDarkMode() {
        document.body.classList.toggle("dark-mode");
    }
</script>

@endsection
