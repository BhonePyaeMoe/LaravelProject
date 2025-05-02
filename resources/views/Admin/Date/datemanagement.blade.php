<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('Staff/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.9/flatpickr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.9/flatpickr.min.js"></script>
    <title>Date Management</title>
</head>
<body>
    
    @include('Admin.Security')
    @include('Admin.AdminNavigation')

    <div class="container">
        <div class="main">

            <div class="user_search mbar">
                <span onclick="showadminnav()"> <i class="fa-solid fa-bars"></i> </span>
                <form action="{{ route('datemanagement') }}" method="GET" style="display: flex; gap: 10px;">
                    <input type="text" name="search" placeholder="Search by date" value="{{ request('search') }}">
                    <button type="submit">Search</button>
                    <a href="{{ route('datemanagement') }}" class="refresh-button">Refresh</a>
                </form>
            </div>  

            <div class="table_display">
                
                <div class="table_header">                
                    <h1>Date Management</h1>

                    <div class="assign-user">
                        <a href="{{ route('dateassign') }}" class="assign">Assign</a>
                    </div>


                </div>

                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Date</th>
                            <th>Day</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if($dates->isEmpty())
                            <tr>
                                <td colspan="4" style="text-align: center;">No dates found.</td>
                            </tr>
                        @endif
                        @foreach($dates as $date)
                            <tr>
                                <td>{{ $loop->iteration + ($dates->currentPage() - 1) * $dates->perPage() }}</td>
                                <td>{{ $date->Date }}</td>
                                <td>{{ $date->Day }}</td>
                                <td class="actiontd">
                                    <a href="{{ route('date.edit', $date->Date_ID) }}" class="btn btn-primary">Update</a>
                                    <form action="{{ route('date.destroy', $date->Date_ID) }}" method="POST" style="display:inline-block;">
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
                        <li class="{{ $dates->onFirstPage() ? 'disabled' : '' }}">
                            <a href="{{ $dates->previousPageUrl() }}" class="prev"><i class="fas fa-chevron-left"></i></a>
                        </li>
                        @for($i = 1; $i <= $dates->lastPage(); $i++)
                            <li class="{{ $dates->currentPage() == $i ? 'active' : '' }}">
                                <a href="{{ $dates->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor
                        <li class="{{ $dates->hasMorePages() ? '' : 'disabled' }}">
                            <a href="{{ $dates->nextPageUrl() }}" class="next"><i class="fas fa-chevron-right"></i></a>
                        </li>
                    </ul>
                </div>

            </div>

            <div class="add-user">
                <h2>Add New Date</h2>
                <form action="{{ route('date.store') }}" method="POST">
                    @csrf
                    <input type="text" id="datePicker" name="Date" placeholder="Date" value="{{ date('Y-m-d') }}" required>
                    <input type="text" name="Day" placeholder="Day" value="{{ \Carbon\Carbon::now()->format('l') }}" required readonly>
                    <button type="submit" class="btn btn-success">Add Date</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            flatpickr("#datePicker", {
                dateFormat: "Y-m-d",
                minDate: "today",
                onChange: function(selectedDates, dateStr, instance) {
                    const date = new Date(dateStr);
                    const daysOfWeek = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
                    document.querySelector('input[name="Day"]').value = daysOfWeek[date.getDay()];
                }
            });
        });
    </script>
    <script src="{{ asset('Staff/script.js') }}"></script>

</body>
</html>
