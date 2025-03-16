@extends('layouts.master')

@section('title', 'Grades')

@include('grades.navbar')

@section('content')

<style>
    body {
        background-color: #f8f9fa;
        transition: 0.3s;
    }
    .grades-container {
        max-width: 900px;
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
    .dark-mode .grades-container {
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
    <div class="grades-container">
        <h2 class="text-center mb-3">📚 My Grades</h2>
        <p class="text-center text-muted">Manage and review your grades by term</p>

        <div class="text-end mb-3">
            <a href="{{ route('grades.create') }}" class="btn btn-success">➕ Add Grade</a>
        </div>

        @if($groupedGrades->isEmpty())
            <p class="text-center text-muted">No grades added yet.</p>
        @else
            @foreach ($groupedGrades as $term => $grades)
                <div class="card mt-4">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">📆 Term {{ $term }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr class="table-dark">
                                        <th>Course</th>
                                        <th>Credit Hours</th>
                                        <th>Grade</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($grades as $grade)
                                        <tr>
                                            <td>{{ $grade->course_code }} - {{ $grade->course_name }}</td>
                                            <td>{{ $grade->credit_hours }}</td>
                                            <td>{{ $grade->grade }}</td>
                                            <td>
                                                <a href="{{ route('grades.edit', $grade->id) }}" class="btn btn-warning btn-sm">✏ Edit</a>
                                                <form action="{{ route('grades.destroy', $grade->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">🗑 Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- GPA Calculation per Term -->
                        <div class="text-center mt-3">
                            <h5>📊 Term GPA: <span class="badge bg-success">{{ calculateGPA($grades) }}</span></h5>
                        </div>
                    </div>
                </div>
            @endforeach

            <!-- Cumulative GPA -->
            <div class="text-center mt-5">
                <h3>🎓 Cumulative CGPA: <span class="badge bg-primary">{{ calculateCGPA($groupedGrades) }}</span></h3>
            </div>
        @endif
    </div>
</div>

<script>
    function toggleDarkMode() {
        document.body.classList.toggle("dark-mode");
    }
</script>

@endsection
