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

                </div>
            </div>

            <div class="main_content">
                <h1>Dashboard</h1>
                <p>Welcome to the Dashboard</p>
                @if(session('data'))
                  <p>{{ session('data') }}</p>
                @endif

                <canvas id="myChart" width="100" height="50"></canvas>

                <!-- Include Chart.js script -->
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
              
                <script>
                  // 3. Create the chart using JavaScript
                  var ctx = document.getElementById('myChart').getContext('2d');
                  var myChart = new Chart(ctx, {
                    type: 'line', // Specify chart type: 'line', 'bar', 'pie', etc.
                    data: {
                      labels: ['January', 'February', 'March', 'April', 'May'], // Data labels
                      datasets: [{
                        label: 'Sales over months', // Dataset label
                        data: [12, 19, 3, 5, 2], // The data values corresponding to the labels
                        backgroundColor: 'rgba(54, 162, 235, 0.2)', // Background color for bars
                        borderColor: 'rgba(54, 162, 235, 1)', // Border color for bars
                        borderWidth: 2 // Border width for bars
                      }]
                    },
                    options: {
                      scales: {
                        y: {
                          beginAtZero: true // Ensure the y-axis starts at 0
                        }
                      }
                    }
                  });
                </script>



            </div>
        </div>
    </div>

    <script src="{{ asset('Staff/script.js') }}"></script>
</body>
</html>
