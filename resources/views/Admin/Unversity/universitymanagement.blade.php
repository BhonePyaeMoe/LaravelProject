<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('Staff/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>University Management</title>
</head>
<body>
    
    @include('Admin.AdminNavigation')

    <div class="container">
        <div class="main">

            <div class="user_search">
                <form action="{{ route('universitymanagement') }}" method="GET" style="display: flex; gap: 10px;">
                    <input type="text" name="search" placeholder="Search by university name" value="{{ request('search') }}">
                    <button type="submit">Search</button>
                    <a href="{{ route('universitymanagement') }}" class="refresh-button">Refresh</a>
                </form>
            </div>  

            <div class="table_display">
                
                <h1>University Management</h1>

                <table>
                    <thead>
                        <tr>
                            <th>University ID</th>
                            <th>University Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($universities as $university)
                            <tr>
                                <td>{{ $university->University_ID }}</td>
                                <td>{{ $university->University_Name }}</td>
                                <td>
                                    <a href="{{ route('university.edit', $university->University_ID) }}" class="btn btn-primary">Update</a>
                                    <form action="{{ route('university.destroy', $university->University_ID) }}" method="POST" style="display:inline-block;">
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
                <h2>Add New University</h2>
                <form action="{{ route('university.store') }}" method="POST">
                    @csrf
                    <input type="text" name="University_Name" placeholder="University Name" required>
                    
                    <select name="Country_ID" required>
                        <option value="">Select Country</option>
                        @foreach($countries as $country)
                            <option value="{{ $country->Country_ID }}">{{ $country->Country_Name }}</option>
                        @endforeach
                    </select>

                    <button type="submit" class="btn btn-success">Add University</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
