<!DOCTYPE html>

<html>



<head>

    <title>Admin Mail</title>

</head>

<body>

    <p>Dear Admin,</p>
    <p>We have received an enquiry through the form.</p>
    <p>Below are the details submitted from the customer.</p>
     <strong>Name:</strong> {{ $fromName }}<br>
    <strong>Email:</strong> {{ $fromEmail }}<br>
    <strong>Phone:</strong> {{ $phone }}<br>
     <strong>City:</strong> {{ $city }}<br>
     <strong>Experience:</strong> {{ $exp_yrs }} Years - {{ $months }} Months<br>
    <strong>Last Page Link:</strong>{{ url()->previous() }}<br>


    <br>
    Rgds,

</body>
</html>