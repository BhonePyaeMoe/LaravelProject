<!-- filepath: /c:/xampp/htdocs/Consultancy/resources/views/Admin/User/UpdateUser.blade.php -->
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
                <form action="{{ route('country.update', $country->Country_ID) }}" method="POST">
                    @csrf
                    <div>
                        <label for="Country_Name">Name:</label>
                        <input type="text" name="Country_Name" value="{{ $country->Country_Name }}" required>
                    </div>
                    <button type="submit" class="btn btn-success">Update</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>