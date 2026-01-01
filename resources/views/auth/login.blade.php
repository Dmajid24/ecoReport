<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login | EcoReport</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<div class="overlay">
    <div class="container h-100">
        <div class="row h-100 align-items-center">

            <!-- LEFT CONTENT -->
            <div class="col-lg-6 text-white left-content">
                <img src="{{ asset('img/Login/title.png') }}" class="title" alt="EcoReport">

                <h1>Login</h1>
                <img src="{{ asset('img/Login/logo.gif') }}" class="logo">
                <p>
                    Access your account to submit reports and view the status of environmental issues on campus.
                </p>

               
            </div>

            <!-- RIGHT LOGIN -->
            <div class="col-lg-5 offset-lg-1">
                <div class="login-card">

                    <h3 class="text-center mb-4">LOGIN</h3>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                    
                        <!-- SESSION STATUS -->
                        @if (session('status'))
                            <div class="alert alert-success mb-3">
                                {{ session('status') }}
                            </div>
                        @endif
                    
                        <!-- EMAIL -->
                        <div class="mb-3">
                            <input type="email"
                                   name="email"
                                   value="{{ old('email') }}"
                                   class="form-control"
                                   placeholder="Email"
                                   required autofocus>
                    
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    
                        <!-- PASSWORD -->
                        <div class="mb-3">
                            <input type="password"
                                   name="password"
                                   class="form-control"
                                   placeholder="Password"
                                   required>
                    
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                
                        <!-- BUTTON -->
                        <div class="d-flex justify-content-between align-items-center">
                            <button type="submit" class="btn-action">
                                Sign In
                            </button>
                    
                            <a href="{{ route('register') }}" class="btn-action">
                                Sign Up
                            </a>
                        </div>
                    
                        <!-- FORGOT -->
                        @if (Route::has('password.request'))
                            <div class="text-center mt-3">
                                <a href="{{ route('password.request') }}" class="forgot">
                                    Forgot your password?
                                </a>
                            </div>
                        @endif
                    </form>
                    

                </div>
            </div>

        </div>
    </div>
</div>
</body>
</html>
