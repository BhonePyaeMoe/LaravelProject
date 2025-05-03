<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NovaBright</title>
    <link rel="stylesheet" href="{{ asset('Navigation/navigation.css') }}">
    <link rel="shortcut icon" href="{{ asset('Images/Web_logo.jpg') }}" type="image/x-icon">
</head>
<body>

    @if (session('data.Type_ID') == '1' || session('data.Type_ID') == '2')
    <script>
        window.location = "{{ route('AReturn') }}"
    </script>
    @endif

    <nav class="desktop_nav">
        <div class="logo">
            <a href="{{ route('home') }}"><img src="{{ asset('Images/Logo.png') }}" alt="NovaBright Logo"></a>
        </div>

        <ul>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('about') }}">About</a></li>
            <li><a href="{{ route('chooseconsultant') }}">Services</a></li>
            <li><a href="{{ route('history', !empty(session('data.User_ID')) ? session('data.User_ID') : 'empty') }}">History</a></li>
        </ul>

        <button class="menu">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div> 
        </button>

        @if (session('data.Type_ID') == '3')
            <a href="{{ route('logout') }}" class="Login_btn"> Logout </a>
        @else
            <a href="{{ route('login') }}" class="Login_btn"> Login </a>
        @endif
    </nav>


    <nav class="mobile_nav">
        <ul>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('about') }}">About</a></li>
            <li><a href="{{ route('chooseconsultant') }}">Services</a></li>
            <li><a href="{{ route('history', !empty(session('data.User_ID')) ? session('data.User_ID') : 'empty') }}">History</a></li>
            <li><a href="{{ route('login') }}">Login</a></li>
        </ul>
    </nav>



    <script src="{{ asset('Navigation/navigation.js') }}"></script>
</body>
</html>