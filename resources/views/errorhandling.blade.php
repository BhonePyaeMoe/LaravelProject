<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href=" {{ asset('ErrorHandling/ErrorHandling.css') }}">
    <link rel="shortcut icon" href="{{ asset('Images/Web_logo.jpg') }}" type="image/x-icon">
    <title>NovaBright</title>
</head>
<body>

    @if (session('error'))
        <div class="error-box">
            <p>{{ session('error') }}</p>
            <button onclick="this.parentElement.style.display='none'"><i class="fa-solid fa-xmark"></i></button>
        </div>
    @endif
    @if (session('success'))
        <div class="error-box" style="background-color: #d4edda; color: #155724;">
            <p>{{ session('success') }}</p>
            <button onclick="this.parentElement.style.display='none'"><i class="fa-solid fa-xmark"></i></button>
        </div>
    @endif

    <script>
        setTimeout(() => {
            const errorBox = document.querySelector('.error-box');
            if (errorBox) {
                errorBox.style.transition = 'opacity 0.5s ease';
                errorBox.style.opacity = '0';
                setTimeout(() => {
                    errorBox.style.display = 'none';
                }, 1500);
            }
        }, 1500);
    </script>

</body>

</html>
