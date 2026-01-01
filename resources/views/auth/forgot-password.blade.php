

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
<div class="forget-overlay">
          

            <!-- RIGHT LOGIN -->
                <div class="forget-card">
                <img src="{{ asset('img/Login/title.png') }}" class="title-for" alt="EcoReport">
                    <p>Forgot your password? No problem. Just let us know your email address
                        and we will email you a password reset link that will allow you to
                        choose a new one.</p>
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                
                        <!-- Email Address -->

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

                     
                  
                        <div class="d-flex justify-content-between mt-4">
                            <button type="submit" class="btn-action">Email Password Reset Link</button>
                        </div>
                    </form>
                    

                </div>

    </div>
</div>
</body>
</html>
