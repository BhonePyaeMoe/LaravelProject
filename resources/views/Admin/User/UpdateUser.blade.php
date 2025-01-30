<!-- filepath: /c:/xampp/htdocs/Consultancy/resources/views/Admin/User/UpdateUser.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('Staff/style.css') }}">
    <title>Update User</title>
</head>
<body>
    
    @include('Admin.AdminNavigation')

    <div class="container">
        <div class="main">
            <h1>Update User</h1>
            
            <form action="{{ route('user.update', $user->User_ID) }}" method="POST">
                @csrf
                <div>
                    <label for="User_Name">Name:</label>
                    <input type="text" name="User_Name" value="{{ $user->User_Name }}" required>
                </div>
                <div>
                    <label for="User_Email">Email:</label>
                    <input type="email" name="User_Email" value="{{ $user->User_Email }}" required>
                </div>
                <div>
                    <label for="User_Age">Age:</label>
                    <input type="number" name="User_Age" value="{{ $user->User_Age }}" required>
                </div>
                <div>
                    <label for="User_Phone">Phone:</label>
                    <input type="text" name="User_Phone" value="{{ $user->User_Phone }}" required>
                </div>
                <button type="submit">Update</button>
            </form>
        </div>
    </div>
</body>
</html>