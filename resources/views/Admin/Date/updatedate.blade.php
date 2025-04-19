<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('Staff/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.9/flatpickr.min.css">
    <title>Update Date</title>
</head>
<body>
    
    @include('Admin.Security')
    @include('Admin.AdminNavigation')

    <div class="container">
        <div class="main">

            <h1 class="update_topic">Update Date</h1>
            
            <div class="add-user">
                <form action="{{ route('date.update', $date->Date_ID) }}" method="POST">
                    @csrf
                    <div>
                        <label for="Date">Date:</label>
                        <input type="text" id="datePicker" name="Date" value="{{ $date->Date }}" required>
                    </div>
                    <div>
                        <label for="Day">Day:</label>
                        <input type="text" name="Day" value="{{ $date->Day }}" required readonly>
                    </div>
                    <button type="submit" class="btn btn-success">Update</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.9/flatpickr.min.js"></script>
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
