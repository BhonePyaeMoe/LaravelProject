<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NovaBright Navigation</title>
    <link rel="stylesheet" href="{{ asset('Navigation/navigation.css') }}">
</head>
<body>
    <nav class="desktop_nav">
        <div class="logo">
            <a href="{{ route('home') }}"><img src="{{ asset('Images/Logo.png') }}" alt="NovaBright Logo"></a>
        </div>

        <ul>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('about') }}">About</a></li>
            <li><a href="{{ route('services') }}">Services</a></li>
            <li><a href="{{ route('contact') }}">Contact</a></li>
        </ul>

        <button class="menu">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div> 
        </button>

        <a href="{{ route('login') }}" class="Login_btn"> Login </a>
    </nav>


    <nav class="mobile_nav">
        <ul>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('about') }}">About</a></li>
            <li><a href="{{ route('services') }}">Services</a></li>
            <li><a href="{{ route('contact') }}">Contact</a></li>
            <li><a href="{{ route('login') }}">Login</a></li>
        </ul>
    </nav>



    <script src="{{ asset('Navigation/navigation.js') }}"></script>
</body>
</html>