<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('Navigation/navigation.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>NovaBright</title>
</head>
<body>

    <aside class="sidebar">
        <a href="{{ route('dashboard') }}"><img src="{{ asset('Images/Logo2.png') }}" alt="NovaBright Logo"></a>
        <ul class="admin_menu">
            <li><a href="{{ route('usermanagement') }}"> <i class="fa fa-regular fa-user"> </i> User </a></li>
            <li><a href="{{ route('schedulemanagement') }}"> <i class="fa fa-solid fa-business-time"></i> Schedule </a> </li>
            <li><a href="{{ route('dashboard') }}"> <i class="fa fa-regular fa-handshake"></i> MeetingType </a> </li>
            <li><a href="{{ route('dashboard') }}"> <i class="fa fa-regular fa-calendar"> </i> WorkDay </a> </li>
            <li><a href="{{ route('countrymanagement') }}"> <i class="fa fa-solid fa-globe"></i> Country </a> </li>
            <li><a href="{{ route('dashboard') }}"> <i class="fa fa-solid fa-building-columns"></i> Universities </a> </li>
            <li><a href="{{ route('dashboard') }}"> <i class="fa fa-solid fa-user-tie"></i> Consultant </a> </li>
            <li><a href="{{ route('dashboard') }}"> <i class="fa fa-solid fa-book"></i> Appointment </a> </li>
            <li><a href="{{ route('dashboard') }}"> <i class="fa fa-solid fa-graduation-cap"></i> Enrollment </a> </li>
        </ul>
    </aside>
</body>
</html>