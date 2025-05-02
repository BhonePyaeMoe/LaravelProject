<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('Customer/style.css') }}">
    <title>NovaBright</title>
    <link rel="shortcut icon" href="{{ asset('Images/Web_logo.jpg') }}" type="image/x-icon">
</head>

<body>

    @if (!session('data'))
        <script>
            window.location = "{{ route('CReturn') }}"
        </script>
    @endif

    @include('errorhandling')
    @include('Customer.navigation')

    <div class="container">

        <h1>Book Appointment</h1>

        <p>{{ $check }}</p>

        <a href="{{ route('choosedatetime', $consultants->Consultant_ID) }}">Go Back</a>

        <form action="{{ route('bookappointment.store') }}" method="POST">
            @csrf

            <input type="hidden" name="user_id" value="{{ session('data.User_ID') }}">
            <input type="hidden" name="consultant_id" value="{{ $consultants->Consultant_ID }}">
            <input type="hidden" name="status" value="Active">

            <label for="user_name">User Name</label>
            <input type="text" id="user_name" name="user_name" value="{{ session('data.User_Name') }}" readonly>

            <label for="consultant_name">Consultant Name</label>
            <input type="text" id="consultant_name" name="consultant_name"
                value="{{ $consultants->Consultant_Name }}" readonly>

            <label for="appointment_date">Appointment Date</label>
            <input type="text" id="appointment_date" name="appointment_date" value="{{ $dates->Date }}" required>

            <input type="hidden" name="appointment_starttime" value="{{ $schedules->StartTime }}">
            <input type="hidden" name="appointment_endtime" value="{{ $schedules->EndTime }}">

            <label for="appointment_time">Appointment Time</label>
            <input type="text" id="appointment_time" name="appointment_time"
                value="{{ $schedules->StartTime }} - {{ $schedules->EndTime }}" readonly>

            <label for="topic">Topic</label>
            <input type="text" id="topic" name="topic" value="{{ old('topic') }}" required>

            <label for="user_information">User Information</label>
            <input type="text" id="user_information" name="user_information" required>

            <label for="notes">Notes (Optional)</label>
            <textarea id="notes" name="notes" rows="4" cols="50">{{ old('notes') }}</textarea>

            <button type="submit">Book Appointment</button>
        </form>
    </div>
</body>

</html>
