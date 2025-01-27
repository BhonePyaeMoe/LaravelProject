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

    <div class="container">
        <header>
            <h1>Welcome to Our Consultancy Company</h1>
            <p>Your success is our priority.</p>
            <button class="cta-button">Get Started</button>
        </header>

        <section>
            <h2>About Us</h2>
            <p>We provide top-notch consultancy services to help your business grow and succeed.</p>
        </section>

        <section>
            <h2>Our Services</h2>
            <ul>
                <li>Business Strategy</li>
                <li>Market Analysis</li>
                <li>Financial Planning</li>
                <li>Operational Improvement</li>
            </ul>
        </section>

        <section>
            <h2>Contact Us</h2>
            <p>Email: info@consultancy.com</p>
            <p>Phone: (123) 456-7890</p>
            <button class="cta-button">Contact Us</button>
        </section>
    </div>

    <footer>
        <p>&copy; 2023 Consultancy Company. All rights reserved.</p>
    </footer>
</body>
</html>