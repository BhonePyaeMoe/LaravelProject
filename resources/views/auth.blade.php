<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('Auth/auth.css') }}">
    <link rel="stylesheet" href="{{ asset('Navigation/navigation.css') }}">
</head>

<body>

    @include('errorhandling')
    
    <nav class="auth_mobile_nav">

        <ul>

            <li><a href="{{ route('home') }}">Home</a></li>
        </ul>

    </nav>

    <div class="auth">
        <div class="shader desktop">
            <div class="login-side">
                <h2>Sign In</h2>
                <form action="{{ route('login.post') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" id="username" name="username" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" class="form-control" required>
                    </div>
                    <div class="form-check">
                        <a href="{{ route('forgotpassword') }}"> Forget Password</a>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
            <div class="signup-side">
                <h2>Create Account</h2>
                <form action="{{ route('login.register') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="User_Name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="signup-email" name="User_Email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">PhoneNumber:</label>
                        <input type="text" id="phone" name="User_Phone" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" id="signup-password" name="User_Password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password:</label>
                        <input type="password" id="password_confirmation" name="User_Password_confirmation"
                            class="form-control" required>
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
    </div>

    @include('mobileauth')

    <script src="{{ asset('Auth/auth.js') }}"></script>
</body>

</html>
