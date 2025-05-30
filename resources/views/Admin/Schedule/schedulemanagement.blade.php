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
                            <th>No</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if($schedules->isEmpty())
                            <tr>
                                <td colspan="4" style="text-align: center;">No schedules found.</td>
                            </tr>
                        @endif
                        @foreach($schedules as $schedule)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $schedule->StartTime }}</td>
                                <td>{{ $schedule->EndTime }}</td>
                                <td class="actiontd">
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

                <div class="pagination">
                    <ul>
                        <li class="{{ $schedules->onFirstPage() ? 'disabled' : '' }}">
                            <a href="{{ $schedules->previousPageUrl() }}" class="prev"><i class="fas fa-chevron-left"></i></a>
                        </li>
                        @for($i = 1; $i <= $schedules->lastPage(); $i++)
                            <li class="{{ $schedules->currentPage() == $i ? 'active' : '' }}">
                                <a href="{{ $schedules->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor
                        <li class="{{ $schedules->hasMorePages() ? '' : 'disabled' }}">
                            <a href="{{ $schedules->nextPageUrl() }}" class="next"><i class="fas fa-chevron-right"></i></a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="add-user">
                <h2>Add New Schedule</h2>
                <form action="{{ route('schedule.store') }}" method="POST">
                    @csrf
                    <input type="time" class="stime" onchange="calculate()" name="StartTime" required step="3600">
                    <input type="time" class="etime" name="EndTime" required readonly>
                    <button type="submit" class="btn btn-success">Add Schedule</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function calculate(){
            var start = document.querySelector('.stime').value;
            var end = document.querySelector('.etime').value;
            
            let startTime = new Date(`1970-01-01T${start}:00`);
            startTime.setMinutes(startTime.getMinutes() + 40);
            let formattedEndTime = startTime.toTimeString().slice(0, 5);
            document.querySelector('.etime').value = formattedEndTime;
        }
    </script>
    <script src="{{ asset('Staff/script.js') }}"></script>

</body>
</html>
