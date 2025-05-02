<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('Staff/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Consultant Management</title>
</head>
<body>
    
    @include('Admin.Security')
    @include('Admin.AdminNavigation')

    <div class="container">
        <div class="main">

            <div class="user_search mbar">
                <span onclick="showadminnav()"> <i class="fa-solid fa-bars"></i> </span>
                <form action="{{ route('consultantmanagement') }}" method="GET" style="display: flex; gap: 10px;">
                    <input type="text" name="search" placeholder="Search by consultant name" value="{{ request('search') }}">
                    <button type="submit">Search</button>
                    <a href="{{ route('consultantmanagement') }}" class="refresh-button">Refresh</a>
                </form>
            </div>  

            <div class="table_display">
                
                <h1>Consultant Management</h1>

                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Consultant Name</th>
                            <th>Profile</th>
                            <th>Experience</th>
                            <th>Consultant Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if($consultants->isEmpty())
                            <tr>
                                <td colspan="6" style="text-align: center;">No consultants found.</td>
                            </tr>
                        @endif
                        @foreach($consultants as $consultant)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $consultant->Consultant_Name }}</td>
                                <td><img src="{{ $consultant->Profile }}" alt="User Image"></td>
                                <td>{{ $consultant->Experience }}</td>
                                <td>{{ $consultant->Consultant_Email }}</td>
                                <td class="actiontd">
                                    <a href="{{ route('consultant.edit', $consultant->Consultant_ID) }}" class="btn btn-primary">Update</a>
                                    <form action="{{ route('consultant.destroy', $consultant->Consultant_ID) }}" method="POST" style="display:inline-block;">
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
                        <li class="{{ $consultants->onFirstPage() ? 'disabled' : '' }}">
                            <a href="{{ $consultants->previousPageUrl() }}" class="prev"><i class="fas fa-chevron-left"></i></a>
                        </li>
                        @for($i = 1; $i <= $consultants->lastPage(); $i++)
                            <li class="{{ $consultants->currentPage() == $i ? 'active' : '' }}">
                                <a href="{{ $consultants->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor
                        <li class="{{ $consultants->hasMorePages() ? '' : 'disabled' }}">
                            <a href="{{ $consultants->nextPageUrl() }}" class="next"><i class="fas fa-chevron-right"></i></a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="add-user">
                <h2>Add New Consultant</h2>
                <form action="{{ route('consultant.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="Consultant_Name" placeholder="Consultant Name" required>
                    <input type="file" name="Profile" required>
                    <input type="text" name="Experience" placeholder="Experience" required>
                    <input type="email" name="Consultant_Email" placeholder="Email Address" required>
                    <button type="submit" class="btn btn-success">Add Consultant</button>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('Staff/script.js') }}"></script>
</body>
</html>
