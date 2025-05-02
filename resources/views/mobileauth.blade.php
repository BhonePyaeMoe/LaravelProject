<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NovaBright</title>
    <link rel="shortcut icon" href="{{ asset('Images/Web_logo.jpg') }}" type="image/x-icon">
</head>

<body>

    <div class="shader mobile">

        <div class="login-mobile-side">
            <div>
                <h2>Sign In</h2>
                <button class="switch" onclick="switchForm()"> SIGN IN </button>
            </div>
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
        <div class="signup-mobile-side">
            <div>
                <h2>Create Account</h2>
                <button class="switch" onclick="switchForm()"> LOGIN </button>
            </div>
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
                    <input type="password" id="password_confirmation" name="User_Password_confirmation" class="form-control"
                        required>
                </div>
                <button type="submit" class="btn btn-primary">Sign Up</button>
            </form>
        </div>
    </div>

    <script>

        function switchForm() {
            var loginSide = document.querySelector(".login-mobile-side");
            var signupSide = document.querySelector(".signup-mobile-side");

            console.log(loginSide.style.display);

            if (loginSide.style.display === "none") {
                loginSide.style.display = "block";
                signupSide.style.display = "none";
            } else {
                loginSide.style.display = "none";
                signupSide.style.display = "block";
            }
        }
    </script>
</body>

</html>
