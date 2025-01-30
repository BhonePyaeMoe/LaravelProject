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

    @include('Admin.AdminNavigation')

    <div class="container">
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
