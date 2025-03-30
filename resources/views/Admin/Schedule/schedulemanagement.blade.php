<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('Staff/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Schedule Management</title>
</head>
<body>
    
    @include('Admin.AdminNavigation')

    <div class="container">
        <div class="main">

            <div class="user_search">
                <form action="{{ route('schedulemanagement') }}" method="GET" style="display: flex; gap: 10px;">
                    <input type="text" name="search" placeholder="Search by schedule ID" value="{{ request('search') }}">
                    <button type="submit">Search</button>
                    <a href="{{ route('schedulemanagement') }}" class="refresh-button">Refresh</a>
                </form>
            </div>  

            <div class="table_display">
                
                <div class="table_header">                
                    <h1>Schedule Management</h1>

                    <div class="assign-user">
                        <a href="{{ route('scheduleassign') }}" class="assign">Assign</a>
                    </div>


                </div>


                <table>
                    <thead>
                        <tr>
                            <th>Schedule ID</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($schedules as $schedule)
                            <tr>
                                <td>{{ $schedule->Schedule_ID }}</td>
                                <td>{{ $schedule->StartTime }}</td>
                                <td>{{ $schedule->EndTime }}</td>
                                <td>
                                    <a href="{{ route('schedule.edit', $schedule->Schedule_ID) }}" class="btn btn-primary">Update</a>
                                    <form action="{{ route('schedule.destroy', $schedule->Schedule_ID) }}" method="POST" style="display:inline-block;">
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

            <div class="add-user">
                <h2>Add New Schedule</h2>
                <form action="{{ route('schedule.store') }}" method="POST">
                    @csrf
                    <input type="time" name="StartTime" required>
                    <input type="time" name="EndTime" required>
                    <button type="submit" class="btn btn-success">Add Schedule</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
