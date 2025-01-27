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
        <ul>
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ url('/about') }}">About Us</a></li>
            <li><a href="{{ url('/services') }}">Services</a></li>
            <li><a href="{{ url('/contact') }}">Contact</a></li>
            <li><a href="{{ url('/blog') }}">Blog</a></li>
        </ul>
        <div class="menu-toggle">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </nav>

    <main>
        <!-- Your content goes here -->
    </main>

    <script src=" {{ asset('Navigation/navigation.js ') }}""></script>
</body>
</html>