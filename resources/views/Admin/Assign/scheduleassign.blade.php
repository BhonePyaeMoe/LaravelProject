<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('Staff/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Update Schedule</title>
</head>
<body>
    
    @include('Admin.Security')
    @include('Admin.AdminNavigation')

    <div class="container">
        <div class="main">

            <div class="user_search">
                <form action="{{ route('scheduleassign') }}" method="GET" style="display: flex; gap: 10px;">
                    <input type="text" name="search" placeholder="Search by consultant name" value="{{ request('search') }}">
                    <button type="submit">Search</button>
                    <a href="{{ route('scheduleassign') }}" class="refresh-button">Refresh</a>
                </form>
            </div>  

            <div class="table_display">
                
                <h1>WorkSchedule Table</h1>

                <table>
                    <thead>
                        <tr>
                            <th>WorkSchedule ID</th>
                            <th>Consultant Name</th>
                            <th>StartTime</th>
                            <th>EndTime</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($workschedules as $workschedule)
                            <tr>
                                <td>{{ $workschedule->WorkSchedule_ID }}</td>
                                <td>{{ $workschedule->consultant->Consultant_Name }}</td>
                                <td>{{ \Carbon\Carbon::parse($workschedule->schedule->StartTime)->format('H:i') }}</td>
                                <td>{{ \Carbon\Carbon::parse($workschedule->schedule->EndTime)->format('H:i') }}</td>
                                <td>
                                    <a href="{{ route('scheduleassign.edit', $workschedule->WorkSchedule_ID) }}" class="btn btn-primary">Update</a>
                                    <form action="{{ route('scheduleassign.destroy', $workschedule->WorkSchedule_ID) }}" method="POST" style="display:inline-block;">
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

            <h1 class="update_topic">Assign WorkSchedule</h1>
            
            <div class="add-user">
                <form action="{{ route('scheduleassign.store') }}" method="POST">
                    @csrf
                    <div>
                        <label for="schedule">Select Data:</label>
                        <select name="Schedule_ID" id="assign" class="form-control" {{ $schedules->isEmpty() ? 'disabled' : '' }}>
                            @if($schedules->isEmpty())
                                <option value="">No schedule available</option>
                            @else
                                @foreach($schedules as $schedule)
                                    <option value="{{ $schedule->Schedule_ID }}">
                                        {{ \Carbon\Carbon::parse($schedule->StartTime)->format('H:i') }} - {{ \Carbon\Carbon::parse($schedule->EndTime)->format('H:i') }}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <div>
                        <label for="consultant">Select Data:</label>
                        <select name="Consultant_ID" id="assign" class="form-control" {{ $consultants->isEmpty() ? 'disabled' : '' }}>
                            @if($consultants->isEmpty())
                                <option value="">No consultants available</option>
                            @else
                                @foreach($consultants as $consultant)
                                    <option value="{{ $consultant->Consultant_ID }}">
                                        {{ $consultant->Consultant_Name }}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Assign</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
