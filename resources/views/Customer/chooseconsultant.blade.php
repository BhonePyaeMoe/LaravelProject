<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>NovaBright</title>
    <link rel="shortcut icon" href="{{ asset('Images/Web_logo.jpg') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('Customer/style.css') }}">
</head>

<body>

    @include('errorhandling')
    @include('Customer.navigation')

    <div class="choose-main">

        <h1>Choose Consultant</h1>

        <div class="chooseconsultant">

            @foreach ($consultants as $consultant)
                <div class="consultant-card">

                    <img src="{{ $consultant->Profile }}" alt="User Image">

                    <div class="consultant-info">
                        <div class="info-all">
                            <div class="top-info">
                                <h2>{{ $consultant->Consultant_Name }}</h2>
                                <p> Experience : {{ $consultant->Experience }}</p>
                                <p>Email : {{ $consultant->Consultant_Email }}</p>

                                <div class="countries_list">

                                    @if ($consultant->countries->isNotEmpty())
                                        @foreach ($consultant->countries as $consultingcountries)
                                            <li>{{ $consultingcountries->Country_Name }} </li>
                                        @endforeach
                                    @else
                                        <li>No Countries</li>
                                    @endif
                                </div>

                            </div>

                            <a href="{{ route('choosedatetime', $consultant->Consultant_ID) }}">BOOK APPOINTMENT</a>
                        </div>

                    </div>

                </div>
            @endforeach

        </div>
    </div>






</body>

</html>
