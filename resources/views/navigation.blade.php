<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NovaBright Navigation</title>
    <link rel="stylesheet" href="{{ asset('Navigation/navigation.css') }}">
</head>
<body>
    <nav>
        <div class="logo">
            <a href="{{ url('/') }}"><img src="{{ asset('Images/Logo.png') }}" alt="NovaBright Logo"></a>
        </div>

        <ul>
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ url('/about') }}">About</a></li>
            <li><a href="{{ url('/universities') }}">Universities</a></li>
            <li><a href="{{ url('/appointment') }}">Appointment</a></li>
        </ul>

        <div class="menu">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div> 
        </div>

        <a href="{{ url('/login') }}" class="Login_btn"> Login </a>
    </nav>



    <script src="{{ asset('Navigation/navigation.js') }}"></script>
</body>
</html>