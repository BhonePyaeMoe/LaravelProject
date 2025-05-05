<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NovaBright</title>
    <link rel="shortcut icon" href="{{ asset('Images/Web_logo.jpg') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('Customer/style.css') }}">
</head>



<body>

    @include('Customer.navigation')
    @include('errorhandling')

    <div class="appoint-container">
        <h1>
            <a href=" {{ route('home') }}" style="text-decoration: none; color: #0b70fe; margin-right: 20px;"> 
                <i class="fa-solid fa-arrow-left" style="font-size: 20px;"></i>
            </a>
            Appointment History
        </h1>

        <table>
            <thead>
                <tr>
                    <th>NO</th>
                    <th>CONSULTANT NAME</th>
                    <th>DATE</th>
                    <th>START-TIME</th>
                    <th>END-TIME</th>
                    <th>TOPIC</th>
                    <th>STATUS</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>

                @if($appointments->isEmpty())
                    <tr>
                        <td colspan="8" style="text-align: center; padding: 15px;">No appointments found.</td>
                    </tr>
                @endif
                @foreach($appointments as $appointment)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $appointment->consultant->Consultant_Name }}</td>
                        <td>{{ $appointment->AppointmentDate }}</td>
                        <td>{{ $appointment->Appointment_StartTime }}</td>
                        <td>{{ $appointment->Appointment_EndTime }}</td>
                        <td>{{ !empty($appointment->Appointment_Topic) ? $appointment->Appointment_Topic : '-' }}</td>
                        <td class="{{ $appointment->Status == 'Cancelled' ? 'status-cancelled' : 'status-active' }}">
                            {{ $appointment->Status }}
                        </td>
                        <td>
                            @if($appointment->Status == 'Active')
                                <form action="{{ route('cancelappointment', $appointment->Appointment_ID) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="cancel-button">Cancel</button>
                                </form>
                            @else
                            <button type="submit" class="cancel-disabled" disabled>Cancel</button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @include('Customer.footer')

</body>

</html>
