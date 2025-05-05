<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NovaBright</title>
    <link rel="shortcut icon" href="{{ asset('Images/Web_logo.jpg') }}" type="image/x-icon">
</head>

<body>

    @include('errorhandling')
    @include('Customer.navigation')

    <div class="about-main">

        <div class="about-us-intro">

            <div class="first-about-page">

                <h2>About US</h2>

                <p>At NovaBright Education Consultancy, we empower students to choose the right course and university to
                    navigating applications and visas, we simplify every step of the journey. With a strong network of
                    global institutions and a passion for student success, NovaBright is your trusted partner in
                    education.
                </p>

            </div>

            <div class="second-about-page">

                <img src="{{ asset('Images/about-1.jpg') }}">

            </div>

        </div>

        <div class="our-mission">

            <div class="first-about-page">

                <h2>Our Mission</h2>

                <p>Our mission is to empower students to choose the right course and university, navigating applications
                    and visas, we simplify every step of the journey. With a strong network of global institutions and a
                    passion for student success, NovaBright is your trusted partner in education.
                </p>

            </div>

            <div class="second-about-page">

                <img src="{{ asset('Images/about-2.jpg') }}">

            </div>

        </div>

        <div class="about-us-intro">

            <div class="first-about-page">

                <h2>Why Choose Us</h2>

                <p>At NovaBright Education Consultancy, we empower students to choose the right course and university to
                    navigating applications and visas, we simplify every step of the journey. With a strong network of
                    global institutions and a passion for student success, NovaBright is your trusted partner in
                    education.
                </p>

            </div>

            <div class="second-about-page">

                <img src="{{ asset('Images/about-3.jpg') }}">

            </div>

        </div>

        <div class="our-mission">

            <div class="first-about-page">

                <h2>Contact Us</h2>

                <div class="contact-us">

                    <p>Let's get in touch with NovaBright for expert guidance on your education
                        journey</p>
                    <p>Address: Sanchaung Tower, Pyay Rooad, Yangon, Myanmar </p>
                    <p> Phone: +959 635 459 218</p>
                    <p>Email: <a>info@novabright.com</a></p>

                </div>

                <div class="icon-contact">
                    <p>Follow us on social media:</p>
                    <i class="fa-brands fa-facebook" style="color: #005eff;"></i>
                    <i class="fa-brands fa-twitter" style="color: #005eff;"></i>
                    <i class="fa-brands fa-square-x-twitter" style="color: #0d0d0d;"></i>
                    <i class="fa-brands fa-linkedin" style="color: #005eff;"></i>
                </div>



            </div>

            <div class="second-about-page">

                <img src="{{ asset('Images/about-4.jpg') }}">

            </div>

        </div>

    </div>

    @include('Customer.footer')

</body>

</html>
