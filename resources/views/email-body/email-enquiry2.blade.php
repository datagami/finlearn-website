<!DOCTYPE html>

<html>



<head>

    <title>Customer Mail </title>

</head>



<body>



    <p> Dear {{ $fromName }},</p>



    <p>Thanks for your enquiry submission.! </p>
    <p>Below are the details submitted from you. </p>
    <strong>Name:</strong> {{ $fromName }}<br>
    <strong>Email:</strong> {{ $fromEmail }}<br>
    <strong>Phone:</strong> {{ $phone }}<br>
     <strong>City:</strong> {{ $city }}<br>
     <strong>Experience:</strong> {{ $exp_yrs }} Years - {{ $months }} Months<br>
    <p>Our Team will call you with in 4 working hours.</p>
    <p> In case of query, please revert. </p>

    Rgds,<br>
    Finlearn <br>
    Phone: +91 9833443014<br>
    Email: admissions@datagami.in





</body>



</html>