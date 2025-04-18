<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('Staff/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Appointment Management</title>
</head>
<body>
    
    @include('Admin.AdminNavigation')

    <div class="container">
        <div class="main">

            <div class="user_search">
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
                            <th>ID</th>
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
                        @foreach($appointments as $appointment)
                            <tr>
                                <td>{{ $appointment->Appointment_ID}}</td>
                                <td> <img src="{{ $appointment->Consultant->Profile}}"> <br>{{ $appointment->Consultant->Consultant_Name}}</td>
                                <td> {{ $appointment->User->User_Name}}</td>
                                <td>{{ $appointment->AppointmentDate}}</td>
                                <td>{{ $appointment->Appointment_StartTime}}</td>
                                <td>{{ $appointment->Appointment_EndTime}}</td>
                                <td> {{ $appointment->Status }}</td>
                                <td>
                                    <a href="{{ route('appointment.edit', $appointment->Appointment_ID) }}" class="btn btn-primary">Update</a>
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
            </div>
        </div>
    </div>
</body>
</html>
