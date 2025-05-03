<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('Staff/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>NovaBright</title>
    <link rel="shortcut icon" href="{{ asset('Images/Web_logo.jpg') }}" type="image/x-icon">
</head>
<body>

    @include('Admin.Security')
    @include('Admin.AdminNavigation')

    <div class="container">
        <div class="main">

            <div class="user_search mbar">
                <span onclick="showadminnav()"> <i class="fa-solid fa-bars"></i> </span>
                <form action="{{ route('appointmentmanagement') }}" method="GET" style="display: flex; gap: 10px;">
                    <input type="text" name="search" placeholder="Search by customer name" value="{{ request('search') }}">
                    <button type="submit">Search</button>
                    <a href="{{ route('appointmentmanagement') }}" class="refresh-button">Refresh</a>
                </form>
            </div>

            <div class="table_display">
                
                <div class="table_header">                
                    <h1>Appointment Management</h1>
                </div>

                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Consultant Name</th>
                            <th>Customer Name</th>
                            <th>Date</th>
                            <th>StartTime</th>
                            <th>EndTime</th>   
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($appointments->isEmpty())
                            <tr>
                                <td colspan="8" style="text-align: center;">No appointments found.</td>
                            </tr>
                        @endif

                        @foreach($appointments as $appointment)
                            <tr>
                                <td>{{ $loop->iteration}}</td>
                                <td> <img src="{{ $appointment->Consultant->Profile}}"> <br>{{ $appointment->Consultant->Consultant_Name}}</td>
                                <td> {{ $appointment->User->User_Name}}</td>
                                <td>{{ $appointment->AppointmentDate}}</td>
                                <td>{{ $appointment->Appointment_StartTime}}</td>
                                <td>{{ $appointment->Appointment_EndTime}}</td>
                                <td>
                                    @if(\Carbon\Carbon::parse($appointment->AppointmentDate) < \Carbon\Carbon::today())
                                        <i class="fa-solid fa-triangle-exclamation" style="color: red"></i> Expired
                                    @else
                                    {{ $appointment->Status }}
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('appointment.destroy', $appointment->Appointment_ID) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $appointments->links() }}
            </div>
        </div>
    </div>

    <script src="{{ asset('Staff/script.js') }}"></script>
</body>
</html>
