@extends('layouts.master')

@section('title', 'Forgot Password')

@section('content')
<div class="container">
    <h2 class="text-center">🔒 Forgot Password</h2>

    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ url('/forgot-password') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Security Answer</label>
            <input type="text" name="security_answer" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary w-100">Verify Answer</button>
    </form>
</div>
@endsection
