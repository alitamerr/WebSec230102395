@extends('layouts.master')

@section('title', 'Reset Password')

@section('content')
<div class="container">
    <h2 class="text-center">🔑 Reset Password</h2>

    <form action="{{ route('reset.password') }}" method="POST">
        @csrf
        <input type="hidden" name="email" value="{{ $email }}">

        <div class="mb-3">
            <label>New Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success w-100">Change Password</button>
    </form>
</div>
@endsection
