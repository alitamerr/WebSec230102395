<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Laravel App')</title>
    
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</head>
<nav class="navbar navbar-expand-sm bg-light">
  <div class="container-fluid">
    <ul class="navbar-nav me-auto">
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/') }}">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('even') }}">Even Numbers</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('prime') }}">Prime Numbers</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('multable') }}">Multiplication Table</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('multiquiz') }}">Multiplication Quiz</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('minitest') }}">MiniTest</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('transcript') }}">Transcript</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('products') }}">Products</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/calculator') }}">Calculator</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/gpa-simulator') }}">GPA Simulator</a>
      </li>

      {{-- Show "Grades" only for authenticated users --}}
      @auth
        <li class="nav-item">
          <a class="nav-link" href="{{ route('grades.index') }}">Grades</a>
        </li>
        {{-- Add "Books" Section --}}
        <li class="nav-item">
          <a class="nav-link" href="{{ route('books.index') }}">📚 My Books</a>
        </li>
      @endauth
    </ul>

    <ul class="navbar-nav ms-auto">
      @auth
        <li class="nav-item">
          <a class="nav-link" href="{{ route('profile') }}">{{ auth()->user()->name }}</a>
        </li>

        @if(auth()->user()->can('accessAdminDashboard', App\Models\User::class))
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">Admin Dashboard</a>
    </li>
@endif

        {{-- Show this only if the user has permission to manage users --}}
        @if(auth()->user()->can('manage users'))
        @endif

        <li class="nav-item">
          <a class="nav-link" href="{{ route('do_logout') }}"
             onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
             Logout
          </a>
          <form id="logout-form" action="{{ route('do_logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </li>
      @else
        <li class="nav-item">
          <a class="nav-link" href="{{ route('login') }}">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('register') }}">Register</a>
        </li>
      @endauth
      <a class="nav-link" href="{{ route('manage_users') }}">Manage Users</a>
      <li class="nav-item">
    <a class="nav-link" href="{{ route('do_logout') }}"
       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
       Logout
    </a>
    <form id="logout-form" action="{{ route('do_logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</li>

    </ul>
  </div>
</nav>
