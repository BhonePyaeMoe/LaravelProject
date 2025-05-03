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

            <div class="go-back">
                <a href="{{ route('consultantmanagement') }}"> <i class="fa fa-solid fa-arrow-left"></i></a>
                <h1 class="update_topic">Update Consultant</h1>
            </div>
            
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
