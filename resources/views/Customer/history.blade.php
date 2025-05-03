<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NovaBright</title>
    <link rel="shortcut icon" href="{{ asset('Images/Web_logo.jpg') }}" type="image/x-icon">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }

        .appoint-container {
            background: #fff;
            margin: 50px;
            min-height: calc(100vh - 131px);
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            font-family: Arial, Helvetica, sans-serif;
        }

        .appoint-container h1 {
            font-weight: 300;
            color: #0b70fe;
            padding: 50px 50px 50px 30px;
        }

        .appoint-container table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .appoint-container th,
        .appoint-container td {
            border: 1px solid #ddd;
            padding: 20px 10px;
            text-align: center;
            border-left: none;
            border-right: none;
        }

        .appoint-container th{
            letter-spacing: 1px;
        }

        .appoint-container tr:hover {
            background-color: #f1f1f1;
        }

        .cancel-button {
            background-color: red;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
        }

        .cancel-button:hover {
            background-color: darkred;
        }

        .cancel-disabled {
            background-color: #ccc;
            cursor: not-allowed;
            color: #333;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
        }    

        .status-cancelled {
            color: red;
        }

        .status-active {
            color: rgb(0, 255, 0);
        }

        footer {
            text-align: center;
            padding: 15px;
            background-color: #007bff;
            color: white;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            ..appoint-container table {
                display: block;
                overflow-x: auto;
                white-space: nowrap;
            }

            th, td {
                font-size: 14px;
                padding: 8px;
            }

            h1 {
                font-size: 20px;
            }

            .cancel-button {
                padding: 5px 8px;
                font-size: 12px;
            }
        }

        @media (max-width: 480px) {
            h1 {
                font-size: 18px;
            }

            th, td {
                font-size: 12px;
                padding: 6px;
            }

            .cancel-button {
                padding: 4px 6px;
                font-size: 10px;
            }
        }
    </style>
</head>

<body>

    @include('Customer.navigation')
    @include('errorhandling')

    <div class="appoint-container">
        <h1>
            <a href=" {{ route('home') }}" style="text-decoration: none; color: #0b70fe; margin-right: 20px;"> 
                <i class="fa-solid fa-house" style="font-size: 25px;"></i>
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

    <footer>
        &copy; 2025 Consultancy. All Rights Reserved.
    </footer>

</body>

</html>
