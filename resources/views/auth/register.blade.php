<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register | EcoReport</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>
<div class="overlay">
    <div class="container">
        <div class="row align-items-center min-vh-100">

            <!-- LEFT CONTENT (SAMA SEPERTI LOGIN) -->
            <div class="col-lg-6 text-white left-content">
                <img src="{{ asset('img/Login/title.png') }}" class="logo" alt="EcoReport">

                <h1>Register</h1>
                <p>
                    Create an account to submit reports and track environmental issues on campus.
                </p>

                <a href="{{ route('login') }}" class="btn btn-learn">
                    Already have an account?
                </a>
            </div>

            <!-- RIGHT CARD -->
            <div class="col-lg-5 offset-lg-1">
                <div class="login-card">

                    <h3 class="text-center mb-4">REGISTER</h3>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                    
                        <!-- ERROR SUMMARY -->
                        @if ($errors->any())
                            <div class="alert alert-danger mb-3">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    
                        <!-- NAME -->
                        <div class="mb-3">
                            <input type="text"
                                   name="name"
                                   value="{{ old('name') }}"
                                   class="form-control @error('name') is-invalid @enderror"
                                   placeholder="Name"
                                   required>
                    
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    
                        <!-- EMAIL -->
                        <div class="mb-3">
                            <input type="email"
                                   name="email"
                                   value="{{ old('email') }}"
                                   class="form-control @error('email') is-invalid @enderror"
                                   placeholder="Email"
                                   required>
                    
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    
                        <!-- PASSWORD -->
                        <div class="mb-3">
                            <input type="password"
                                   name="password"
                                   class="form-control @error('password') is-invalid @enderror"
                                   placeholder="Password"
                                   required>
                    
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    
                        <!-- CONFIRM PASSWORD -->
                        <div class="mb-3">
                            <input type="password"
                                   name="password_confirmation"
                                   class="form-control"
                                   placeholder="Confirm Password"
                                   required>
                        </div>
                    
                        <div class="d-flex justify-content-between mt-4">
                            <button type="submit" class="btn-action">Sign up</button>
                        </div>
                    </form>
                    

                </div>
            </div>

        </div>
    </div>
</div>
</body>
</html>
