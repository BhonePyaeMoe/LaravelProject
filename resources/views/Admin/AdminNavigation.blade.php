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
            <li><a href="{{ route('dashboard') }}"> <i class="fa fa-solid fa-house"></i> Home </a></li>
            <li><a href="{{ route('usermanagement') }}"> <i class="fa fa-regular fa-user"> </i> User </a></li>
            <li><a href="{{ route('schedulemanagement') }}"> <i class="fa fa-solid fa-business-time"></i> WorkSchedule </a> </li>
            <li><a href="{{ route('datemanagement') }}"> <i class="fa fa-regular fa-calendar"> </i> WorkDate </a> </li>
            <li><a href="{{ route('countrymanagement') }}"> <i class="fa fa-solid fa-globe"></i> Country </a> </li>
            <li><a href="{{ route('universitymanagement') }}"> <i class="fa fa-solid fa-building-columns"></i> Universities </a> </li>
            <li><a href="{{ route('consultantmanagement') }}"> <i class="fa fa-solid fa-user-tie"></i> Consultant </a> </li>
            <li><a href="{{ route('dashboard') }}"> <i class="fa fa-solid fa-book"></i> Appointment </a> </li>

        </ul>
    </aside>

    <script>
        @if(session('error'))
            alert("{{ session('error') }}");
        @endif

        @if(session('success'))
            alert("{{ session('success') }}");
        @endif
    </script>

</body>
</html>