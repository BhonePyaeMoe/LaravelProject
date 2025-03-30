<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('Staff/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Update Consultant</title>
</head>
<body>
    
    @include('Admin.AdminNavigation')

    <div class="container">
        <div class="main">

            

            <h1 class="update_topic">Update Consultant</h1>
            
            <div class="add-user">
                <form action="{{ route('consultant.update', $consultant->Consultant_ID) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    

                    <div>
                        <label for="Consultant_Name">Name:</label>
                        <input type="text" name="Consultant_Name" value="{{ $consultant->Consultant_Name }}" required>
                    </div>
                    <div>   
                        <label for="Profile">Profile:</label>
                        <input type="file" name="Profile">
                    </div>
                    <div>
                        <label for="Experience">Experience:</label>
                        <input type="text" name="Experience" value="{{ $consultant->Experience }}" required>
                    </div>
                    <div>
                        <label for="Consultant_Email">Email:</label>
                        <input type="email" name="Consultant_Email" value="{{ $consultant->Consultant_Email }}" required>
                    </div>
                
                    <button type="submit" class="btn btn-success">Update</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
