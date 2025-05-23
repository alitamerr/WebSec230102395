<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | Ali Tamer</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h4>🔐 Login</h4>
                    </div>
                    <div class="card-body">
                        
                        {{-- ✅ Success Message (e.g., after logout or registration) --}}
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{-- ✅ General Error Message --}}
                        @if(request()->error)
                            <div class="alert alert-danger">
                                <strong>Error!</strong> {{ request()->error }}
                            </div>
                        @endif

                        {{-- ✅ Validation Errors (e.g., Incorrect Credentials) --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {{-- ✅ Login Form --}}
                        <form action="{{ route('do_login') }}" method="POST">
                            @csrf  {{-- ✅ CSRF protection --}}

                            <div class="mb-3">
                                <label for="email" class="form-label">📧 Email:</label>
                                <input type="email" name="email" class="form-control" placeholder="Enter your email" required value="{{ old('email') }}">
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">🔑 Password:</label>
                                <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Login</button>
                        </form>

                        {{-- ✅ Extra Options --}}
                        <div class="text-center mt-3">
                            <p>Don't have an account? <a href="{{ route('register') }}">Register here</a></p>
                            <p><a href="{{ route('forgot.password') }}">Forgot your password?</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
