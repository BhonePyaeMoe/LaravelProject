<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book Appointment</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        a {
            display: block;
            text-align: center;
            margin: 15px 0;
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Book Appointment</h1>

        @if (session('data'))
            @php
                $users = session('data');
            @endphp
            <p>{{ $users }}</p>
        @else
            <script>
                window.location = "{{ route('CReturn') }}"
            </script>
        @endif

        <a href="{{ route('choosedatetime', $consultants->Consultant_ID) }}">Go Back</a>

        <form action="{{ route('bookappointment.store') }}" method="POST">
            @csrf

            <input type="hidden" name="user_id" value="{{ $users->User_ID }}">
            <input type="hidden" name="consultant_id" value="{{ $consultants->Consultant_ID }}">
            <input type="hidden" name="status" value="Pending">

            <label for="user_name">User Name</label>
            <input type="text" id="user_name" name="user_name" value="{{ $users->User_Name }}" readonly>

            <label for="consultant_name">Consultant Name</label>
            <input type="text" id="consultant_name" name="consultant_name" value="{{ $consultants->Consultant_Name }}" readonly>

            <label for="appointment_date">Appointment Date</label>
            <input type="text" id="appointment_date" name="appointment_date" value="{{ $dates->Date }}" required>

            <input type="hidden" name="appointment_starttime" value="{{ $schedules->StartTime }}">
            <input type="hidden" name="appointment_endtime" value="{{ $schedules->EndTime }}">

            <label for="appointment_time">Appointment Time</label>
            <input type="text" id="appointment_time" name="appointment_time" value="{{ $schedules->StartTime }} - {{ $schedules->EndTime }}" readonly>

            <label for="topic">Topic</label>
            <input type="text" id="topic" name="topic" value="{{ old('topic') }}" required>

            <label for="user_information">User Information</label>
            <input type="text" id="user_information" name="user_information" required>

            <label for="notes">Notes</label>
            <textarea id="notes" name="notes" rows="4" cols="50">{{ old('notes') }}</textarea>

            <button type="submit">Book Appointment</button>
        </form>
    </div>
</body>

</html>
