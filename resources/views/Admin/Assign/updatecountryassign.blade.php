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

            <h1 class="update_topic">Update Assigned Consulting Country</h1>

            <div class="add-user">
                <form action="{{ route('countryassign.update', $consultingCountry->Consultingcountry_ID) }}" method="POST">
                    @csrf
                    <div>
                        <label for="country">Select Country:</label>
                        <select name="Country_ID" id="assign" class="form-control" {{ $countries->isEmpty() ? 'disabled' : '' }}>
                            @if ($countries->isEmpty())
                                <option value="">No country available</option>
                            @else
                                <option value="{{ $consultingCountry->Country_ID }}" selected>
                                    {{ $consultingCountry->country->Country_Name }}
                                </option>
                                @foreach ($countries as $country)
                                    @if ($country->Country_ID != $consultingCountry->Country_ID)
                                        <option value="{{ $country->Country_ID }}">
                                            {{ $country->Country_Name }}
                                        </option>
                                    @endif
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <div>
                        <label for="consultant">Select Consultant:</label>
                        <select name="Consultant_ID" id="assign" class="form-control" {{ $consultants->isEmpty() ? 'disabled' : '' }}>
                            @if ($consultants->isEmpty())
                                <option value="">No consultants available</option>
                            @else
                                <option value="{{ $consultingCountry->Consultant_ID }}" selected>
                                    {{ $consultingCountry->consultant->Consultant_Name }}
                                </option>
                                @foreach ($consultants as $consultant)
                                    @if ($consultant->Consultant_ID != $consultingCountry->Consultant_ID)
                                        <option value="{{ $consultant->Consultant_ID }}">
                                            {{ $consultant->Consultant_Name }}
                                        </option>
                                    @endif
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
