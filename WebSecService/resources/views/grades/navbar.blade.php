<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <!-- Brand / Title -->
        <a class="navbar-brand fw-bold" href="{{ route('grades.index') }}">
            🎓 My Grades
        </a>

        <!-- Dark Mode Toggle Button -->
        <button class="btn btn-outline-light me-3" onclick="toggleDarkMode()">🌙</button>

        <!-- Navbar Toggler for Mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Items -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('grades.index') }}">📑 View Grades</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('grades.create') }}">➕ Add Grade</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('grades.index') }}#gpa">📊 GPA & CGPA</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-warning text-dark px-3 ms-2" href="{{ route('home') }}">
                        ⬅ Back to Dashboard
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<style>
    body {
        background-color: #f8f9fa;
        transition: 0.3s;
    }
    .dark-mode {
        background-color: #1e1e1e;
        color: #f8f9fa;
    }
    .dark-mode .navbar {
        background-color: #2c2c2c !important;
    }
</style>

<script>
    function toggleDarkMode() {
        document.body.classList.toggle("dark-mode");
    }
</script>
