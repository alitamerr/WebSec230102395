<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Transcript</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</head>

<body>
    @extends('layouts.master')

    @section('title', 'Student Transcript')

    @section('content')
    <div class="card m-4">
        <div class="card-header">Student Transcript</div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Course</th>
                        <th>Grade</th>
                        <th>Credits</th>
                    </tr>
                </thead>
                <tbody>
                    @php $totalCredits = 0; @endphp
                    @foreach ($transcript as $course)
                        <tr>
                            <td>{{ $course['course'] }}</td>
                            <td>{{ $course['grade'] }}</td>
                            <td>{{ $course['credits'] }}</td>
                        </tr>
                        @php $totalCredits += $course['credits']; @endphp
                    @endforeach
                    <tr class="table-info">
                        <td colspan="2"><strong>Total Credits</strong></td>
                        <td><strong>{{ $totalCredits }}</strong></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    @endsection
</body>

</html>
