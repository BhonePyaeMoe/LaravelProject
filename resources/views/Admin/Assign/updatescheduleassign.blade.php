<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('Staff/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.9/flatpickr.min.css">
    <title>NovaBright</title>
    <link rel="shortcut icon" href="{{ asset('Images/Web_logo.jpg') }}" type="image/x-icon">
</head>

<body>

    @include('Admin.Security')
    @include('Admin.AdminNavigation')

    <div class="container">
        <div class="main">

            <h1 class="update_topic">Update Assigned Schedule</h1>

            <div class="add-user">
                <form action="{{ route('scheduleassign.update', $workSchedule->WorkSchedule_ID) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div>
                        
                        <label for="schedule">Select Schedule:</label>
                        <select name="Schedule_ID" id="assign" class="form-control"
                            {{ $schedules->isEmpty() ? 'disabled' : '' }}>
                            @if ($schedules->isEmpty())
                                <option value="">No Schedule available</option>
                            @else
                                <option value="{{ $workSchedule->Schedule_ID }}" selected>
                                    {{ \Carbon\Carbon::parse($workSchedule->schedule->StartTime)->format('H:i') }} - 
                                    {{ \Carbon\Carbon::parse($workSchedule->schedule->EndTime)->format('H:i') }}
                                </option>
                                @foreach ($schedules as $schedule)
                                    @if ($schedule->Schedule_ID != $workSchedule->Schedule_ID)
                                        <option value="{{ $schedule->Schedule_ID }}">
                                            {{ \Carbon\Carbon::parse($schedule->StartTime)->format('H:i') }} - 
                                            {{ \Carbon\Carbon::parse($schedule->EndTime)->format('H:i') }}
                                        </option>
                                    @endif
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <div>
                        <label for="consultant">Select Consultant:</label>
                        <select name="Consultant_ID" id="assign" class="form-control"
                            {{ $consultants->isEmpty() ? 'disabled' : '' }}>
                            @if ($consultants->isEmpty())
                                <option value="">No consultants available</option>
                            @else
                                <option value="{{ $workSchedule->consultant->Consultant_ID }}" selected>
                                    {{ $workSchedule->consultant->Consultant_Name }}
                                </option>
                                @foreach ($consultants as $consultant)
                                    @if ($consultant->Consultant_ID != $workSchedule->Consultant_ID)
                                        <option value="{{ $consultant->Consultant_ID }}">
                                            {{ $consultant->Consultant_Name }}
                                        </option>
                                    @endif
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Update</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
