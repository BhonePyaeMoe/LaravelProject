<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('Staff/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Assign Consulting Country</title>
</head>
<body>
    
    @include('Admin.Security')
    @include('Admin.AdminNavigation')

    <div class="container">
        <div class="main">

            <div class="user_search mbar">
                <span onclick="showadminnav()"> <i class="fa-solid fa-bars"></i> </span>
                <form action="{{ route('countryassign') }}" method="GET" style="display: flex; gap: 10px;">
                    <input type="text" name="search" placeholder="Search by consultant name" value="{{ request('search') }}">
                    <button type="submit">Search</button>
                    <a href="{{ route('countryassign') }}" class="refresh-button">Refresh</a>
                </form>
            </div>  

            <div class="table_display">
                
                <h1>Consulting Country Table</h1>

                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Consultant Name</th>
                            <th>Country Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if($consultingCountries->isEmpty())
                            <tr>
                                <td colspan="4" style="text-align: center;">No consulting countries found.</td>
                            </tr>
                        @endif

                        @foreach($consultingCountries as $consultingCountry)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $consultingCountry->consultant->Consultant_Name }}</td>
                                <td>{{ $consultingCountry->country->Country_Name }}</td>
                                <td class="actiontd"> 
                                    <a href="{{ route('countryassign.edit', $consultingCountry->Consultingcountry_ID) }}" class="btn btn-primary">Update</a>
                                    <form action="{{ route('countryassign.destroy', $consultingCountry->Consultingcountry_ID) }}" method="POST" style="display:inline-block;">
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

            <h1 class="update_topic">Assign Consulting Country</h1>
            
            <div class="add-user">
                <form action="{{ route('countryassign.store') }}" method="POST">
                    @csrf
                    <div>
                        <label for="country">Select Country:</label>
                        <select name="Country_ID" id="assign" class="form-control" {{ $countries->isEmpty() ? 'disabled' : '' }}>
                            @if($countries->isEmpty())
                                <option value="">No country available</option>
                            @else
                                @foreach($countries as $country)
                                    <option value="{{ $country->Country_ID }}">
                                        {{ $country->Country_Name }}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <div>
                        <label for="consultant">Select Consultant:</label>
                        <select name="Consultant_ID" id="assign" class="form-control" {{ $consultants->isEmpty() ? 'disabled' : '' }}>
                            @if($consultants->isEmpty())
                                <option value="">No consultants available</option>
                            @else
                                @foreach($consultants as $consultant)
                                    <option value="{{ $consultant->Consultant_ID }}">
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
