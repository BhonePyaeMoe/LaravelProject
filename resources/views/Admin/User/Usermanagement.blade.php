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
                <form action="{{ route('usermanagement') }}" method="GET" style="display: flex; gap: 10px;">
                    <input type="text" name="search" placeholder="Search by username" value="{{ request('search') }}">
                    <button type="submit">Search</button>
                    <a href="{{ route('usermanagement') }}" class="refresh-button">Refresh</a>
                </form>
            </div>  

            <div class="table_display">
                
                <h1>User Management</h1>

                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>User Name</th>
                            <th>User Email</th>
                            <th>User Age</th>
                            <th>User Phone</th>
                            <th>User Type</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if($users->isEmpty())
                            <tr>
                                <td colspan="3" style="text-align: center;">No users found.</td>
                            </tr>
                        @endif
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->User_Name }}</td>
                                <td>{{ $user->User_Email }}</td>
                                <td>{{ $user->User_Age ?? '-' }}</td>
                                <td>{{ $user->User_Phone }}</td>
                                <td>{{ $user->TypeName }}</td>
                                <td class="actiontd">
                                    <a href="{{ route('user.edit', $user->User_ID) }}" class="btn btn-primary">Update</a>
                                    <form action="{{ route('user.destroy', $user->User_ID) }}" method="POST" style="display:inline-block;">
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
                        <li class="{{ $users->onFirstPage() ? 'disabled' : '' }}">
                            <a href="{{ $users->previousPageUrl() }}" class="prev"><i class="fas fa-chevron-left"></i></a>
                        </li>
                        @for($i = 1; $i <= $users->lastPage(); $i++)
                            <li class="{{ $users->currentPage() == $i ? 'active' : '' }}">
                                <a href="{{ $users->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor
                        <li class="{{ $users->hasMorePages() ? '' : 'disabled' }}">
                            <a href="{{ $users->nextPageUrl() }}" class="next"><i class="fas fa-chevron-right"></i></a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="add-user">
                <h2>Add New Website Admin</h2>
                <form action="{{ route('user.store') }}" method="POST">
                    @csrf
                    <input type="text" name="User_Name" placeholder="Username" required>
                    <input type="email" name="User_Email" placeholder="Email Address" required>
                    <input type="password" name="User_Password" placeholder="Password" required>
                    <input type="number" name="User_Age" placeholder="Age">
                    <input type="text" name="User_Phone" placeholder="Phonenumber"  required>
                    <input type="text" placeholder="Admin" value="Admin" readonly>
                    <input type="hidden" name="Type_ID" value="2">
                    <button type="submit" class="btn btn-success">Add User</button>
                </form>
            </div>
        </div>
    </div>
    
    <script src="{{ asset('Staff/script.js') }}"></script>

</body>
</html>