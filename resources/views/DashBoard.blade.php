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
                <span onclick="showadminnav"> <i class="fa-solid fa-bars"></i> </span>

            </div>

            <div class="main_content">
                <h1>Dashboard</h1>
                <p>Welcome to the Dashboard</p>
                <p> {{ session('groupedUsers') }} </p>
                <p> {{ session('groupedAppointments') }} </p>
                @if (session('data'))
                    <p>{{ session('data') }}</p>
                @endif

                <canvas id="myChart" width="100" height="50"></canvas>

                <!-- Include Chart.js script -->
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                <script>
                    // 3. Create the chart using JavaScript
                    var ctx = document.getElementById('myChart').getContext('2d');
                    // Extract data from session('groupedUsers')
                    var groupedUsers = @json(session('groupedUsers'));

                    // Prepare labels and data for the chart
                    var labels = Object.keys(groupedUsers); // Extract keys (months) as labels
                    var data = Object.values(groupedUsers); // Extract values (counts) as data

                    // Create the chart
                    var myChart = new Chart(ctx, {
                        type: 'bar', // Specify chart type: 'line', 'bar', 'pie', etc.
                        data: {
                            labels: labels, // Dynamic labels from session data
                            datasets: [{
                                label: 'User Count by Month', // Dataset label
                                data: data, // Dynamic data values from session data
                                backgroundColor: 'rgba(54, 162, 235, 0.2)', // Background color for bars
                                borderColor: 'rgba(54, 162, 235, 1)', // Border color for bars
                                borderWidth: 2 // Border width for bars
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true, // Ensure the y-axis starts at 0
                                    ticks: {
                                        stepSize: 1 // Set the step size to 1
                                    }
                                }
                            }
                        }
                    });
                </script>

                <canvas id="appointmentChart" width="100" height="50"></canvas>

                <script>
                  // Extract data from session('groupedAppointments')
                  var groupedAppointments = @json(session('groupedAppointments'));

                  // Prepare labels and data for the chart
                  var appointmentLabels = Object.keys(groupedAppointments); // Extract keys (months) as labels
                  var appointmentData = Object.values(groupedAppointments); // Extract values (counts) as data

                  // Create the chart
                  var appointmentChart = new Chart(document.getElementById('appointmentChart').getContext('2d'), {
                    type: 'line', // Specify chart type: 'line', 'bar', 'pie', etc.
                    data: {
                      labels: appointmentLabels, // Dynamic labels from session data
                      datasets: [{
                        label: 'Appointments by Date', // Dataset label
                        data: appointmentData, // Dynamic data values from session data
                        backgroundColor: 'rgba(255, 99, 132, 0.2)', // Background color for line fill
                        borderColor: 'rgba(255, 99, 132, 1)', // Border color for line
                        borderWidth: 2, // Border width for line
                      }]
                    },
                    options: {
                      scales: {
                        y: {
                          beginAtZero: true, // Ensure the y-axis starts at 0
                          ticks: {
                            stepSize: 1 // Set the step size to 1
                          }
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
