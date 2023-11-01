<!DOCTYPE html>
<html>

<head>
    <title>Thank You Page</title>
    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    /* Custom CSS styles */
    body {
        background-image: url('https://www.markaz.com/getmedia/c083b008-b6ba-4e17-9da5-6408b1137a4f/investment.jpg?width=1600&height=800&ext=.jpg');
        /* Add your image URL here */
        background-size: cover;
        background-repeat: no-repeat;
        text-align: center;
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
