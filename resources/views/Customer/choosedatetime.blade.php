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
            font-size: 27px;
        }

        td,th{
            font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 18px;
            font-weight: 500;
            padding: 15px;
        }
        .datetime-container h2 {
            margin: 40px;
        }

        .datetime-container p {
            margin: 5px 0;
        }

        .inv-container {
            padding: 30px 0px;
            margin: 40px 0px;
            border: 1px solid #ddd;
        }

        .inv-container h3{
            padding-bottom: 15px;
        }

        .schedule-container        
        {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
            gap: 20px;
            max-width: calc:(100% - 40px);
        }
        .small-container a{
            padding: 20px 10px;
            min-width: 270px;
            display: inline-block;
            margin-top: 10px;
            color: #007bff;
            border: 1px solid #007bff;
            text-decoration: none;
            border-radius: 5px;
        }
        .small-container a:hover {
            background-color: #007bff;
            color: white;
        }

    </style>

    @include('errorhandling')
    @include('navigation')

    <div class="datetime-container">
        <h2>Choose Appointment Date and Time</h2>

        <div id="calendar"></div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
            const calendar = document.createElement('table');
            calendar.style.width = '100%';
            calendar.style.borderCollapse = 'collapse';

            const daysOfWeek = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
            const headerRow = document.createElement('tr');

            daysOfWeek.forEach(day => {
                const th = document.createElement('th');
                th.textContent = day;
                th.style.border = '1px solid #ddd';
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
                    cell.addEventListener('click', function () {
                        
                        const currentSelectedDate = hiddendate.textContent; // Dynamically update the selected date
                        hiddendate.value = formattedDate;

                        const previouslySelectedCell = document.querySelector('td.selected');
                        if (previouslySelectedCell) {
                            previouslySelectedCell.classList.remove('selected');
                            previouslySelectedCell.style.backgroundColor = 'white';
                        }

                        cell.classList.add('selected');
                        cell.style.backgroundColor = '#007bff';

                        if (currentSelectedDate === formattedDate) {
                            datetimeContainer.style.display = datetimeContainer.style.display == 'none' ? 'block' : 'none';
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

        <div id="datetime-container" class="inv-container" style="display :none;">

            <h3> Please Select Appointment Time</h3>
            <input type="hidden" id="hiddendate" name="hiddendate" value="" readonly>

            <div class="schedule-container">
            @foreach ($workschedules->schedules as $schedule)
                <div class="small-container">
                    <a href="{{ route('bookappointment', ['id1' => $schedule->Schedule_ID, 'id2' => $workdates->Consultant_ID, 'date' => 'date']) }}" 
                        onclick="this.href=this.href.replace('date', document.getElementById('hiddendate').value)"> 
                        {{ \Carbon\Carbon::parse($schedule->StartTime)->format('h:i A') }} - {{ \Carbon\Carbon::parse($schedule->EndTime)->format('h:i A') }}
                    </a>
                </div>
            @endforeach
            </div>

        </div>

    </div>
    
</body>
</html>