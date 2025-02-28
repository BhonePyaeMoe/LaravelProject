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
    
    @include('Admin.AdminNavigation')

    <div class="container">
        <div class="main">

            <div class="user_search">
                <form action="{{ route('datemanagement') }}" method="GET" style="display: flex; gap: 10px;">
                    <input type="text" name="search" placeholder="Search by date" value="{{ request('search') }}">
                    <button type="submit">Search</button>
                    <a href="{{ route('datemanagement') }}" class="refresh-button">Refresh</a>
                </form>
            </div>  

            <div class="table_display">
                
                <h1>Date Management</h1>

                <table>
                    <thead>
                        <tr>
                            <th>Date ID</th>
                            <th>Date</th>
                            <th>Day</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dates as $date)
                            <tr>
                                <td>{{ $date->Date_ID }}</td>
                                <td>{{ $date->Date }}</td>
                                <td>{{ $date->Day }}</td>
                                <td>
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
            </div>

            <div class="add-user">
                <h2>Add New Date</h2>
                <form action="{{ route('date.store') }}" method="POST">
                    @csrf
                    <input type="text" id="datePicker" name="Date" required>
                    <input type="text" name="Day" required readonly>
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
</body>
</html>
