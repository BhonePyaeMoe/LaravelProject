<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('Staff/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Update User</title>
</head>
<body>
    
    @include('Admin.AdminNavigation')

    <div class="container">
        <div class="main">

            <h1 class="update_topic">Update User</h1>
            
            <div class="add-user">
                <form action="{{ route('user.update', $user->User_ID) }}" method="POST">
                    @csrf
                    <div>
                        <label for="User_Profile"></label>
                    </div>
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
                    <div>
                        <label for="Type_ID">User Type:</label>
                        <input type="text" name="Type_ID" value="{{ $user->TypeName }}" readonly>
                    </div>
                
                    <button type="submit" class="btn btn-success">Update</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>