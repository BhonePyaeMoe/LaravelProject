<!-- filepath: /c:/xampp/htdocs/Consultancy/resources/views/welcome.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultancy Company</title>
    <link rel="stylesheet" href="{{ asset('Customer/style.css') }}">
</head>
<body>

    @include('navigation')

    <div class="first_container">

        <div class="home_background"></div>

        <div class="Home_display">
            <img src="{{ asset('Images/Home.jpg') }}" alt="Consultancy Company Logo">
            
            

            <div class="Home_text">
                <h1>Welcome to NovaBright</h1>
                <p>Your success is our priority. Let us help you achieve your business goals with our expert consultancy services.</p>
                
            </div>
        </div>

    </div>

    <div class="second_container">

    </div>

        


    <footer>
        <p>&copy; 2023 Consultancy Company. All rights reserved.</p>
    </footer>
</body>
</html>