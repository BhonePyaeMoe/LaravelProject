<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NovaBright</title>
    <link rel="stylesheet" href="{{ asset('Customer/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('Images/Web_logo.jpg') }}" type="image/x-icon">
</head>


<body>

    @include('Customer.navigation')
    @include('errorhandling')

    <div class="first_container">

        <div class="home_background"></div>

        <div class="Home_display">
            <img src="{{ asset('Images/Home.jpg') }}" alt="Consultancy Company Logo">

            <div class="Home_text">
                <h1>Welcome to NovaBright</h1>
                <p>Your success is our priority. Let us help you achieve your business goals with our expert consultancy
                    services.</p>
            </div>
        </div>

    </div>

    <div class="test-topic">

        <h1>Testimonials</h1>

        <p>Discover how our academic community is achieving excellence through our platform.</p>

    </div>

    <div class="second_container">

        <div class="testimonial">

            <div class="test-top">
                <img src="{{ asset('Images/male.jpg') }}">

                <div class="test-info">
                    <h3>John Doe</h3>
                    <p>Student</p>
                </div>

            </div>

            <div class="test-bottom">
                <p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" NovaBright's consultancy services transformed our business strategy,
                    leading to exceptional growth and success. Their team's dedication and expertise are unmatched.
                    Highly recommended!  "</p>
            </div>

        </div>
        <div class="testimonial">

            <div class="test-top">
                <img src="{{ asset('Images/male.jpg') }}">

                <div class="test-info">
                    <h3>John Doe</h3>
                    <p>Student</p>
                </div>

            </div>

            <div class="test-bottom">
                <p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; " NovaBright team is highly responsive, knowledgeable, and always willing to help. I have been
                    working with them for over six months. Their expertise has been invaluable to me and I would highly recommend
                    them to anyone looking for high-quality consultancy services. "</p>
            </div>

        </div>

        <div class="testimonial">

            <div class="test-top">
                <img src="{{ asset('Images/male.jpg') }}">

                <div class="test-info">
                    <h3>Jane Smith</h3>
                    <p>Parent</p>
                </div>

            </div>

            <div class="test-bottom">
                <p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; " I have been working with NovaBright for over a year now and I can
                    honestly say that they have
                    exceeded my expectations. Their team is highly skilled and knowledgeable, and they always go the
                    extra mile to deliver exceptional results. I highly recommend them to anyone looking for top-notch
                    consultancy services. "</p>
            </div>

        </div>

    </div>
    
    <div class="third_container">

        <div class="third-info">

            <h1>Join Our Community</h1>
            <p>Find out how our online community is helping students and parents achieve their academic goals.</p>

        </div>
        
        <div class="third-btn">

            <a href= {{ route('login') }}> GET STARTED </a>

        </div>

    </div>

    @include('Customer.footer')

</body>

</html>
