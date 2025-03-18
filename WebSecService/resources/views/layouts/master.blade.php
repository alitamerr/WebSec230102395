<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>Basic Website - @yield('title')</title>
 <link href="{{ asset('public/css/bootstrap.min.css') }}" rel="stylesheet">
 <script src="{{ asset('public/js/bootstrap.bundle.min.js') }}"></script>
</head>
<body>
 @include('layouts.menu')
 <div class="container">
 @yield('content')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">My App</a>
        </div>
    </nav>
 </div>
</body>
</html>
