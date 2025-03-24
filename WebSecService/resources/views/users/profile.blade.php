<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Profile</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</head>
<body>
<h1>Welcome, {{ $user->name }}</h1>
<p>Credit Balance: ${{ $user->credit }}</p>
    <div class="container mt-5">
        <h1>Welcome, {{ Auth::user()->name }}</h1>
        <p>Your account has been successfully created.</p>
        
        <!-- Back to Home Button -->
        <a href="{{ url('/') }}" class="btn btn-primary">Back to Home</a>

        <!-- Optionally, include other user information or actions -->
    </div>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">User  Profile</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table table-bordered">
                            <tr>
                                <th>Name</th>
                                <td>{{ auth()->user()->name }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ auth()->user()->email }}</td>
                            </tr>
                            <tr>
    <th>Roles</th>
    <td>
        @foreach($user->roles ?? [] as $role)
            <span class="badge bg-primary">{{ $role->name }}</span>
        @endforeach
    </td>
</tr>

                        </table>
                        <div class="text-center mt-3">
                            <a href="{{ route('change_password') }}" class="btn btn-primary">Change Password</a>
                            <a href="{{ route('do_logout') }}" class="btn btn-danger">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>