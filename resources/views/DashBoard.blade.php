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
    <div div class="container">
    <!-- Dashboard/Sidebar -->
        <aside class="sidebar">
            <a href="{{ route('home') }}"><img src="{{ asset('Images/Logo.png') }}" alt="NovaBright Logo"></a>
        <ul class="menu">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Analytics</a></li>
            <li><a href="#">Reports</a></li>
            <li><a href="#">Users</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">More Tabs...</a></li>
            <li><a href="#">Tab 1</a></li>
            <li><a href="#">Tab 2</a></li>
            <li><a href="#">Tab 3</a></li>
            <li><a href="#">Tab 4</a></li>
            <li><a href="#">Tab 5</a></li>
        </ul>
        </aside>

    </div>

        <div class="searchbar"> 

            <div class="dashboard">
                <i class="fa-solid fa-bars"></i> 
            </div>

            <div class="search">
                <input type="text" placeholder="Search...">
                <button> <i class="fa-solid fa-magnifying-glass"></i> </button>
            </div>
            <div class="logout">
                <a href="{{ route('login') }}"><i class="fa-solid fa-power-off"></i></a>
            </div>
        </div>

        <main class="content">
        <h1>Welcome to the Dashboard</h1>
        <p>Here is your main content area...</p>
        </main>



</body>
</html>
