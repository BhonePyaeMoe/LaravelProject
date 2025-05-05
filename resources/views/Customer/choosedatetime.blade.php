<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NovaBright</title>
    <link rel="shortcut icon" href="{{ asset('Images/Web_logo.jpg') }}" type="image/x-icon">
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
        #calendar-controls
        {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        #calendar-controls span {
            font-size: 20px;
            font-weight: bold;
        }
        #calendar-controls button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        #calendar-controls button:hover {
            background-color: #0056b3;
        }

    </style>

    @include('errorhandling')
    @include('Customer.navigation')

    <div class="datetime-container">
        <h2>Choose Appointment Date and Time</h2>

        <div id="calendar-controls">
            <button id="prev-month" style="margin-right: 10px;"> < </button>
            <span id="current-month"></span>
            <button id="next-month" style="margin-left: 10px;"> > </button>
        </div>

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
                let currentMonth = today.getMonth();
                let currentYear = today.getFullYear();

                const calendarContainer = document.getElementById('calendar');
                const currentMonthSpan = document.getElementById('current-month');
                const prevMonthButton = document.getElementById('prev-month');
                const nextMonthButton = document.getElementById('next-month');
                const hiddendate = document.getElementById('hiddendate');
                const datetimeContainer = document.getElementById('datetime-container');

                function renderCalendar(year, month) {
                    calendar.innerHTML = '';
                    calendar.appendChild(headerRow);

                    const firstDay = new Date(year, month, 1).getDay();
                    const daysInMonth = new Date(year, month + 1, 0).getDate();

                    currentMonthSpan.textContent = new Date(year, month).toLocaleString('default', { month: 'long', year: 'numeric' });

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
                                const formattedDate = `${year}-${String(month + 1).padStart(2, '0')}-${String(date).padStart(2, '0')}`;
                                if (availableDates.includes(formattedDate) && new Date(formattedDate) > today) {
                                    cell.textContent = date;
                                    cell.addEventListener('click', function () {
                                        const currentSelectedDate = hiddendate.value;
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
                }

                prevMonthButton.addEventListener('click', function () {
                    currentMonth--;
                    if (currentMonth < 0) {
                        currentMonth = 11;
                        currentYear--;
                    }
                    renderCalendar(currentYear, currentMonth);
                });

                nextMonthButton.addEventListener('click', function () {
                    currentMonth++;
                    if (currentMonth > 11) {
                        currentMonth = 0;
                        currentYear++;
                    }
                    renderCalendar(currentYear, currentMonth);
                });

                renderCalendar(currentYear, currentMonth);
                calendarContainer.appendChild(calendar);
            });
        </script>

        <div id="datetime-container" class="inv-container" style="display: none;">
            <h3>Please Select Appointment Time</h3>
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

    @include('Customer.footer')
    
</body>
</html>