<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sticky Scrollable Dashboard</title>
  <link rel="stylesheet" href="{{ asset('Staff/style.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <div class="container">
        <aside class="sidebar">
            <a href="{{ route('dashboard') }}"><img src="{{ asset('Images/Logo.png') }}" alt="NovaBright Logo"></a>
            <ul class="menu">
                
                <li><a href="{{ route('dashboard') }}"> <i class="fa fa-regular fa-user"> </i> User </a></li>
                <li><a href="{{ route('dashboard') }}"> <i class="fa fa-solid fa-business-time"></i> Schedule </a> </li>
                <li><a href="{{ route('dashboard') }}"> <i class="fa fa-regular fa-handshake"></i> MeetingType </a> </li>
                <li><a href="{{ route('dashboard') }}"> <i class="fa fa-regular fa-calendar"> </i> WorkDay </a> </li>
                <li><a href="{{ route('dashboard') }}"> <i class="fa fa-solid fa-globe"></i> Country </a> </li>
                <li><a href="{{ route('dashboard') }}"> <i class="fa fa-solid fa-building-columns"></i> Universities </a> </li>
                <li><a href="{{ route('dashboard') }}"> <i class="fa fa-solid fa-user-tie"></i> Consultant </a> </li>
                <li><a href="{{ route('dashboard') }}"> <i class="fa fa-solid fa-book"></i> Appointment </a> </li>
                <li><a href="{{ route('dashboard') }}"> <i class="fa fa-solid fa-graduation-cap"></i> Enrollment </a> </li>
            </ul>
        </aside>


        <div class="main">
            <div class="topbar">
                <div class="dashboard">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>

                <div class="searchbar">

                    <div class="search">
                        <input type="text" placeholder="Search here...">
                        <button><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>

                    <div class="logout">
                        <a href="{{ route('login') }}"><i class="fa-solid fa-power-off"></i></a>
                    </div>

                </div>
            </div>

            <div class="main_content">
                <h1>Dashboard</h1>
                <p>Welcome to the Dashboard</p>
            </div>
        </div>
    </div>

    <script src="{{ asset('Staff/script.js') }}"></script>
</body>
</html>
