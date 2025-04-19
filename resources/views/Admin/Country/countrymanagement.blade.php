<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('Staff/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Country Management</title>
</head>
<body>
    
    @include('Admin.Security')
    @include('Admin.AdminNavigation')

    <div class="container">
        <div class="main">

            <div class="user_search">
                <form action="{{ route('countrymanagement') }}" method="GET" style="display: flex; gap: 10px;">
                    <input type="text" name="search" placeholder="Search by country name" value="{{ request('search') }}">
                    <button type="submit">Search</button>
                    <a href="{{ route('countrymanagement') }}" class="refresh-button">Refresh</a>
                </form>
            </div>  

            <div class="table_display">
                
                <div class="table_header">                
                    <h1>Country Management</h1>

                    <div class="assign-user">
                        <a href="{{ route('countryassign') }}" class="assign">Assign</a>
                    </div>


                </div>

                <table>
                    <thead>
                        <tr>
                            <th>Country ID</th>
                            <th>Country Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($countries as $country)
                            <tr>
                                <td>{{ $country->Country_ID }}</td>
                                <td>{{ $country->Country_Name }}</td>
                                <td>
                                    <a href="{{ route('country.edit', $country->Country_ID) }}" class="btn btn-primary">Update</a>
                                    <form action="{{ route('country.destroy', $country->Country_ID) }}" method="POST" style="display:inline-block;">
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
                <h2>Add New Country</h2>
                <form action="{{ route('country.store') }}" method="POST">
                    @csrf
                    <input type="text" name="Country_Name" placeholder="Country Name" required>
                    <button type="submit" class="btn btn-success">Add Country</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
