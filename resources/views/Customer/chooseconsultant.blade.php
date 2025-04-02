<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>

    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 20px;
    }

    .consultant-card {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin-bottom: 20px;
        text-align: center;
    }

    .consultant-card img {
        width: 100px;
        height: auto;
        border-radius: 50%;
    }

    .consultant-card h2 {
        margin-top: 10px;
    }

    .consultant-card p {
        margin: 5px 0;
    }

    .consultant-card a {
        display: inline-block;
        margin-top: 10px;
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
    }

</style>
<body>


    @include('errorhandling')
    @include('navigation')
    
    @foreach($consultants as $consultant)
        <div class="consultant-card">
            <img src="{{ asset('Images/Consultant.jpg') }}" alt="Consultant Image">
            <h2>{{ $consultant->Consultant_Name }}</h2>
            <p> Experience : {{ $consultant->Experience }}</p>
            <p>{{ $consultant->Consultant_Email }}</p>
            <img src="{{ $consultant->Profile }}" alt="User Image">
            
            @foreach($consultant->countries as $consultingcountries)
                <p>{{ $consultingcountries->Country_Name}}</p>
            @endforeach

            <a href="{{ route('chooseconsultant') }}">Book Appointment</a>
        </div>
    @endforeach
    
        
        



</body>
</html>