@extends('layouts.master')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center">Admin Dashboard</h1>
        
        {{-- Success Message --}}
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">Manage Users</h5>
                        <p class="card-text">View, edit, and assign roles to users.</p>
                        <a href="{{ route('manage_users') }}" class="btn btn-primary">Go to Users</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">Assign Roles</h5>
                        <p class="card-text">Assign roles to users.</p>
                        <a href="{{ route('manage_users') }}" class="btn btn-success">Assign Roles</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">Logout</h5>
                        <p class="card-text">Logout from the admin panel.</p>
                        <a href="{{ route('do_logout') }}" 
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                           class="btn btn-danger">Logout</a>
                        <form id="logout-form" action="{{ route('do_logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
