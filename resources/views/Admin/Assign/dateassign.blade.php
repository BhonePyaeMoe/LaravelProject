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
                <form action="{{ route('dateassign') }}" method="GET" style="display: flex; gap: 10px;">
                    <input type="text" name="search" placeholder="Search by consultant name" value="{{ request('search') }}">
                    <button type="submit">Search</button>
                    <a href="{{ route('dateassign') }}" class="refresh-button">Refresh</a>
                </form>
            </div>  

            <div class="table_display">
                
                <h1>WorkDate Table</h1>

                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Consultant Name</th>
                            <th>Date</th>
                            <th>Day of The Week</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if($workdates->isEmpty())
                            <tr>
                                <td colspan="5" style="text-align: center;">No work dates found.</td>
                            </tr>
                        @endif
                        @foreach($workdates as $workdate)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $workdate->consultant->Consultant_Name }}</td>
                            <td> 
                                @if(\Carbon\Carbon::parse($workdate->date->Date) < \Carbon\Carbon::today())
                                    <i class="fa-solid fa-triangle-exclamation" style="color: red"></i>
                                @endif
                                {{ $workdate->date->Date }}
                            </td>
                            <td>{{ $workdate->date->Day }}</td>
                            <td class="actiontd">
                                <a href="{{ route('dateassign.edit', $workdate->WorkDate_ID) }}" class="btn btn-primary">Update</a>
                                <form action="{{ route('dateassign.destroy', $workdate->WorkDate_ID) }}" method="POST" style="display:inline-block;">
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
                        <li class="{{ $workdates->onFirstPage() ? 'disabled' : '' }}">
                            <a href="{{ $workdates->previousPageUrl() }}" class="prev"><i class="fas fa-chevron-left"></i></a>
                        </li>
                        @for($i = 1; $i <= $workdates->lastPage(); $i++)
                            <li class="{{ $workdates->currentPage() == $i ? 'active' : '' }}">
                                <a href="{{ $workdates->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor
                        <li class="{{ $workdates->hasMorePages() ? '' : 'disabled' }}">
                            <a href="{{ $workdates->nextPageUrl() }}" class="next"><i class="fas fa-chevron-right"></i></a>
                        </li>
                    </ul>
                </div>
            </div>

            <h1 class="update_topic">Assign WorkDate</h1>
            
            <div class="add-user">
                <form action="{{ route('dateassign.store') }}" method="POST">
                    @csrf
                    <div>
                        <label for="date">Select Data:</label>
                        <select name="Date_ID" id="assign" class="form-control" {{ $dates->isEmpty() ? 'disabled' : '' }}>
                            @if($dates->isEmpty())
                                <option value="">No Date available</option>
                            @else
                                @foreach($dates as $date)
                                    <option value="{{ $date->Date_ID }}">
                                        {{ ($date->Date)}} - {{ ($date->Day) }}
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
                                    <option value="{{ $consultant->Consultant_ID  }}">
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

    <script src="{{ asset('Staff/script.js') }}"></script>
</body>
</html>
