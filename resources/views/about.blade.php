<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <link rel="stylesheet" href="{{ asset('About/style.css') }}">
</head>
<body>

    @include('errorhandling')
    @include('navigation')

    <div class="about_container">
        <h1>About Us</h1>
        <p>
            NovaBright is a consultancy company that provides expert advice and guidance to businesses of all sizes. Our team of experienced consultants have a proven track record of helping businesses improve their operations, increase efficiency, and reduce costs. We take pride in our ability to provide personalized service to each of our clients, and we are committed to helping them achieve their goals.
        </p>
        <img src="{{ asset('Images/About.jpg') }}" alt="About Image">
    </div>
    <footer>
        <p>&copy; 2023 Consultancy Company. All rights reserved.</p>
    </footer>
</body>
</html>
