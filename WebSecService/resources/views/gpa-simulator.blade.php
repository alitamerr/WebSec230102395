<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GPA Simulator</title>
    
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    
    <style>
        body {
            background-color: #f8f9fa;
            transition: 0.3s;
        }
        .gpa-container {
            max-width: 700px;
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
        .dark-mode .gpa-container {
            background: #2c2c2c;
            color: #ffffff;
        }
        .btn-toggle {
            position: fixed;
            top: 10px;
            right: 20px;
        }
    </style>
</head>
<body>

    <button class="btn btn-dark btn-toggle" onclick="toggleDarkMode()">🌙</button>

    @extends('layouts.master')
    @section('title', 'GPA Simulator')
    @section('content')

    <div class="container">
        <div class="gpa-container">
            <h2 class="text-center mb-3">🎓 GPA Simulator</h2>
            <p class="text-center text-muted">Add courses and grades to calculate your GPA</p>

            <form id="gpaForm">
                <div class="mb-3">
                    <label for="course" class="form-label">Select Course</label>
                    <select id="course" class="form-select">
                        @foreach($courses as $course)
                            <option value="{{ $course['credit_hours'] }}" data-title="{{ $course['title'] }}">
                                {{ $course['code'] }} - {{ $course['title'] }} ({{ $course['credit_hours'] }} hrs)
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="grade" class="form-label">Enter Grade (A=4, B=3, C=2, D=1, F=0)</label>
                    <input type="number" id="grade" class="form-control" min="0" max="4" step="0.1" placeholder="Grade">
                </div>

                <button type="button" class="btn btn-primary w-100" onclick="addCourse()">Add Course</button>
            </form>

            <h4 class="mt-4 text-center">📋 Courses Added:</h4>
            <div class="table-responsive">
                <table class="table mt-3 table-striped">
                    <thead>
                        <tr class="table-primary">
                            <th>Course</th>
                            <th>Credit Hours</th>
                            <th>Grade</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="courseList"></tbody>
                </table>
            </div>

            <div class="text-center mt-4">
                <h3>📊 GPA: <span id="gpa" class="badge bg-success">0.00</span></h3>
            </div>
        </div>
    </div>

    <script>
        let courses = [];

        function addCourse() {
            let courseSelect = document.getElementById("course");
            let courseTitle = courseSelect.options[courseSelect.selectedIndex].getAttribute("data-title");
            let creditHours = parseFloat(courseSelect.value);
            let grade = parseFloat(document.getElementById("grade").value);

            if (isNaN(grade) || grade < 0 || grade > 4) {
                alert("⚠ Please enter a valid grade between 0 and 4.");
                return;
            }

            let course = { title: courseTitle, creditHours, grade };
            courses.push(course);
            updateCourseList();
            calculateGPA();
        }

        function updateCourseList() {
            let tableBody = document.getElementById("courseList");
            tableBody.innerHTML = "";

            courses.forEach((course, index) => {
                let row = `<tr>
                    <td>${course.title}</td>
                    <td>${course.creditHours}</td>
                    <td>${course.grade}</td>
                    <td>
                        <button class="btn btn-danger btn-sm" onclick="removeCourse(${index})">❌ Remove</button>
                    </td>
                </tr>`;
                tableBody.innerHTML += row;
            });
        }

        function removeCourse(index) {
            courses.splice(index, 1);
            updateCourseList();
            calculateGPA();
        }

        function calculateGPA() {
            let totalCredits = 0;
            let totalPoints = 0;

            courses.forEach(course => {
                totalCredits += course.creditHours;
                totalPoints += course.grade * course.creditHours;
            });

            let gpa = totalCredits > 0 ? (totalPoints / totalCredits).toFixed(2) : "0.00";
            document.getElementById("gpa").innerText = gpa;
        }

        function toggleDarkMode() {
            document.body.classList.toggle("dark-mode");
        }
    </script>

    @endsection
</body>
</html>
