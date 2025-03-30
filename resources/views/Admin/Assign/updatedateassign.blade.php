<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('Staff/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.9/flatpickr.min.css">
    <title>Update and Assign Date</title>
</head>

<body>

    @include('Admin.AdminNavigation')

    <div class="container">
        <div class="main">

            <h1 class="update_topic">Update Assigned Date</h1>

            <div class="add-user">
                <form action="{{ route('dateassign.update', $workdates->WorkDate_ID) }}" method="POST">
                    @csrf
                    <div>

                        <label for="date">Select Data:</label>
                        <select name="Date_ID" id="assign" class="form-control"
                            {{ $dates->isEmpty() ? 'disabled' : '' }}>
                            @if ($dates->isEmpty())
                                <option value="">No Date available</option>
                            @else
                                <option value="{{ $workdates->Date_ID }}" selected>
                                    {{ $workdates->Date->Date }} - {{ $workdates->Date->Day }}
                                </option>
                                @foreach ($dates as $date)
                                    @if ($date->Date_ID != $workdates->Date_ID)
                                        <option value="{{ $date->Date_ID }}">
                                            {{ $date->Date }} - {{ $date->Day }}
                                        </option>
                                    @endif
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <div>
                        <label for="consultant">Select Data:</label>
                        <select name="Consultant_ID" id="assign" class="form-control"
                            {{ $consultants->isEmpty() ? 'disabled' : '' }}>
                            @if ($consultants->isEmpty())
                                <option value="">No consultants available</option>
                            @else
                            <option value="{{ $workdates->consultant->Consultant_ID }}" selected>
                                {{ $workdates->consultant->Consultant_Name }}
                            </option>
                                @foreach ($consultants as $consultant)
                                    <option value="{{ $consultant->Consultant_ID }}">
                                        {{ $consultant->Consultant_Name }}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Update</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
