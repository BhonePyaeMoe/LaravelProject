<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('Auth/auth.css') }}">
</head>
<body>
    <div class="shader">
        <div class="login-side">
            <h2>Sign In</h2>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>
                <div class="form-check">
                    <input type="checkbox" id="remember" name="remember"> 
                    <label for="remember">Remember Me</label>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
        <div class="signup-side">
            <h2>Create Account</h2>
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="signup-email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="phone">PhoneNumber:</label>
                    <input type="text" id="phone" name="phone" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="signup-password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Sign Up</button>
            </form>
        </div>

        <div class="form_image">
            <div class="login_display">
                <h2>Welcome Back!</h2>
                <p>Login to stay informed, and continue your journey with all the tools you need.</p>
                <button class="login_switch"> LOGIN </button>
            </div>
            <div class="signup_display">
                <h2>Hello Friend!</h2>
                <p>Join our community today for a seamless experience and unlock new possibilities.</p>
                <button class="signup_switch"> SIGNUP </button>
            </div>
        </div>
    </div>

    <script src="{{ asset('Auth/auth.js') }}"></script>
</body>
</html>