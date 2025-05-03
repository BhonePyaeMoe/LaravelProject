<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NovaBright</title>
    <link rel="shortcut icon" href="{{ asset('Images/Web_logo.jpg') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('Staff/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<style>
    .main {
        display: flex;
        flex-direction: column;
        height: 100vh;
    }

    .main_dash {
        padding: 30px;
    }

    .dash_intro {
        margin: 0px 70px;
        display: flex;
        flex-wrap: wrap;
        gap: 40px;
    }

    .single-show {
        position: relative;
        padding: 30px;
        flex: 1 1 30%;
        background-color: #ffffff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        border-radius: 10px;
    }

    .single-show .top_dis {
        padding-bottom: 40px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .top_dis i {
        font-size: 25px;
    }

    .single-show>h2 {
        padding-left: 30px;
        font-weight: 100;
    }

    .chart-container {
        padding-top: 25px;
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        gap: 30px;
        justify-content: space-evenly;
    }

    .canva-container {
        padding: 70px;
        margin: 15px 70px 0px 70px;
        width: 100%;
        background-color: #ffffff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        border-radius: 10px;
    }

    .canva-container h2 {
        font-size: 30px;
        text-align: center;
        padding-bottom: 50px;
    }

    .chart-container canvas {
        flex: 1 1 45%;
        min-width: calc(50% - 60px);
        min-height: 400px;
        box-sizing: border-box;
        /* Ensure padding and border are included in the width/height */
    }

    @media screen and (max-width: 1100px) {
        .dash_intro {
            margin: 0px;
            flex-direction: row;
            /* Ensure items are in rows */
        }

        .single-show {
            flex: 1 1 45%;
            /* Adjust to take 45% of the width for 2 items per row */
        }

        .single-show h2 {
            font-size: 20px;
        }

        .single-show .top_dis i {
            font-size: 20px;
        }

        .canva-container {
            padding: 20px;
            margin: 20px 0px 0px 0px;
        }
    }
</style>

<body>

    @include('Admin.AdminNavigation')

    <div class="container">
        <div class="main">
            <div class="topbar mbar">
                <span onclick="showadminnav()"> <i class="fa-solid fa-bars"></i> </span>

            </div>

            <div class="main_dash">
                <div class="dash_intro">
                    <div class="single-show">
                        <div class="top_dis">
                            <h2> Expired Date</h2>
                            <i class="fa-solid fa-triangle-exclamation text-danger" style="color: red;"> </i>
                        </div>

                        <h2 style="color: {{ session('countDate') > 0 ? 'red' : '' }}">{{ session('countDate') }}</h2>
                    </div>
                    <div class="single-show">
                        <div class="top_dis">
                            <h2> Total Appointment</h2>
                            <i class="fa-solid fa-book" style="color: blue;"> </i>
                        </div>

                        <h2>{{ session('totalappointment') }}</h2>
                    </div>
                    <div class="single-show">
                        <div class="top_dis">
                            <h2> Today Appointment </h2>
                            <i class="fa-solid fa-calendar-check" style="color: green;"> </i>
                        </div>

                        <h2>{{ session('todayappointment') }}</h2>
                    </div>
                    <div class="single-show">
                        <div class="top_dis">
                            <h2> Expired Appointment </h2>
                            <i class="fa-solid fa-triangle-exclamation text-danger" style="color: red;"> </i>
                        </div>

                        <h2>{{ session('expiredappointment') }}</h2>
                    </div>
                    <div class="single-show">
                        <div class="top_dis">
                            <h2> Total User</h2>
                            <i class="fa-solid fa-user" style="color: blue;"> </i>
                        </div>

                        <h2>{{ session('totaluser') }}</h2>
                    </div>
                    <div class="single-show">
                        <div class="top_dis">
                            <h2> Progress </h2>
                            <i class="fa-solid fa-arrow-{{ strval(session('progress'))[0] === '-' ? 'down' : 'up' }}" style="color: {{ strval(session('progress'))[0] === '-' ? 'red' : 'green' }};"> </i>
                        </div>

                        <h2>{{ abs(intval(session('progress'))) }} % </h2>
                    </div>
                </div>

                <div class="chart-container">

                    <div class="canva-container">

                        <h2>User Count by Month</h2>

                        <canvas id="userChart">

                            <!-- Include Chart.js script -->
                            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                            <script>
                                // 3. Create the chart using JavaScript
                                var ctx = document.getElementById('userChart').getContext('2d');
                                // Extract data from session('groupedUsers')
                                var groupedUsers = @json(session('groupedUsers'));

                                // Prepare labels and data for the chart
                                var labels = Object.keys(groupedUsers); // Extract keys (months) as labels
                                var data = Object.values(groupedUsers); // Extract values (counts) as data

                                // Create the chart
                                var userChart = new Chart(ctx, {
                                    type: 'bar', // Specify chart type: 'line', 'bar', 'pie', etc.
                                    data: {
                                        labels: labels, // Dynamic labels from session data
                                        datasets: [{
                                            label: 'User', // Dataset label
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

                        </canvas>
                    </div>

                    <div class="canva-container">

                        <h2>Appointments by Date</h2>

                        <canvas id="appointmentChart">

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
                                            label: 'Appointment', // Dataset label
                                            data: appointmentData, // Dynamic data values from session data
                                            backgroundColor: 'rgba(255, 99, 132, 0.2)', // Background color for line fill
                                            borderColor: 'rgba(255, 99, 132, 1)', // Border color for line
                                            borderWidth: 2, // Border width for line
                                        }]
                                    },
                                    options: {
                                        scales: {
                                            y: {
                                                beginAtZero: true,
                                                ticks: {
                                                    stepSize: 1
                                                }
                                            }
                                        }
                                    }
                                });
                            </script>
                        </canvas>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="{{ asset('Staff/script.js') }}"></script>
</body>

</html>
