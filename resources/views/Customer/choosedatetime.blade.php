<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .datetime-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
            text-align: center;
        }

        .datetime-container h2 {
            margin-top: 10px;
        }

        .datetime-container p {
            margin: 5px 0;
        }

        .datetime-container a {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>

    @include('errorhandling')
    @include('navigation')

    <div class="datetime-container">
        <h2>Choose Your Date and Time</h2>

        <div id="calendar"></div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
            const calendar = document.createElement('table');
            calendar.style.width = '100%';
            calendar.style.borderCollapse = 'collapse';
            calendar.style.marginTop = '20px';

            const daysOfWeek = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
            const headerRow = document.createElement('tr');

            daysOfWeek.forEach(day => {
                const th = document.createElement('th');
                th.textContent = day;
                th.style.border = '1px solid #ddd';
                th.style.padding = '10px';
                th.style.backgroundColor = '#007bff';
                th.style.color = '#fff';
                headerRow.appendChild(th);
            });

            calendar.appendChild(headerRow);

            const availableDates = @json($workdates->dates->pluck('Date'));

            const today = new Date();
            const currentMonth = today.getMonth();
            const currentYear = today.getFullYear();

            const firstDay = new Date(currentYear, currentMonth, 1).getDay();
            const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();

            const datetimeContainer = document.getElementById('datetime-container');
            const hiddendate = document.getElementById('hiddendate');
            let currentSelectedDate = hiddendate.textContent;

            let date = 1;
            for (let i = 0; i < 6; i++) {
                const row = document.createElement('tr');

                for (let j = 0; j < 7; j++) {
                const cell = document.createElement('td');
                cell.style.border = '1px solid #ddd';
                cell.style.padding = '10px';
                cell.style.textAlign = 'center';
                cell.style.cursor = 'pointer';

                if (i === 0 && j < firstDay) {
                    cell.textContent = '';
                } else if (date > daysInMonth) {
                    break;
                } else {
                    const formattedDate = `${currentYear}-${String(currentMonth + 1).padStart(2, '0')}-${String(date).padStart(2, '0')}`;
                    if (availableDates.includes(formattedDate)) {
                    cell.textContent = date;
                    cell.style.backgroundColor = '#d4edda';
                    cell.addEventListener('click', function () {
                        
                        const currentSelectedDate = hiddendate.textContent; // Dynamically update the selected date
                        hiddendate.value = formattedDate;

                        
                        if (currentSelectedDate === formattedDate) {
                            datetimeContainer.style.display = datetimeContainer.style.display === 'none' ? 'block' : 'none';
                        } else {
                            datetimeContainer.style.display = 'block';
                        }
                    });
                    } else {
                    cell.textContent = date;
                    cell.style.color = '#ccc';
                    }
                    date++;
                }

                row.appendChild(cell);
                }

                calendar.appendChild(row);

                if (date > daysInMonth) {
                break;
                }
            }

            document.getElementById('calendar').appendChild(calendar);
            });
        </script>

        <div id="datetime-container" style="display :none;">

            <p> Please Select An AvailableDate For Appointment</p>
            <input type="text" id="hiddendate" name="hiddendate" value="" readonly>

            @foreach ($workschedules->schedules as $schedule)


                <p> {{ $schedule}} </p>
                <div style="display: inline-block; margin: 5px; padding: 10px; background-color: #007bff; color: #fff; border-radius: 5px;">
                    <a href="{{ route('bookappointment', ['id1' => $schedule->Schedule_ID, 'id2' => $workdates->Consultant_ID, 'date' => 'date']) }}" onclick="this.href=this.href.replace('date', document.getElementById('hiddendate').value)"> {{ $schedule->StartTime }} - {{ $schedule->EndTime }}</a>
                </div>
            @endforeach

        </div>

    </div>
    
</body>
</html>