<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Finlearn - Investment Banking Operations Program" />
    <meta name="keywords"
        content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <!-- FAVICON AND TOUCH ICONS  -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/favicon_io/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon_io/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon_io/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('img/favicon_io/site.webmanifest') }}">

<style>
/* Custom CSS styles */
body {
            background-image: url('https://www.markaz.com/getmedia/c083b008-b6ba-4e17-9da5-6408b1137a4f/investment.jpg?width=1600&height=800&ext=.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed; /* Ensures background image stays in place */
            text-align: center;
            margin: 0;
            padding: 0;
        }

.thank-you-container {
    background-color: rgba(255, 255, 255, 0.9);
    /* Add a semi-transparent white background */
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
    margin-top: 100px;
}

.thank-you-text {
    font-size: 36px;
    margin-bottom: 20px;
}

.description {
    font-size: 18px;
    margin-bottom: 20px;
}

.btn-primary {
    background-color: #366883;
    /* Background color */
    border: none;
}

.btn-primary:hover {
    background-color: #fecb10;
    /* Hover background color */
}
</style>
</head>

<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3 thank-you-container">
            <h1 class="thank-you-text" style="font-weight: 700;">Thank You!</h1>
            <p class="description">
            Thanks for submitting the form. Your satisfaction is our priority.
            </p>
            @if (session('brochure_form_submitted'))
            <p>To download the brochure, <a href="{{ route('IBOP-Brochure.pdf', ['filename' => 'IBOP-Brochure.pdf']) }}" download style="color:#366883;">click here</a>.</p>
            @else
            <p>You should have received a confirmation email with more details. Please check your email
                inbox for the full information.</p>
            @endif
           
            <a href="{{ route('index') }}" class="btn btn-primary">Go Back To Home</a>
        </div>
    </div>
</div>


<!-- Add Bootstrap JS and jQuery -->
<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>

</html>