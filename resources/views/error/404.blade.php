<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Not Found</title>
    <style>
    body {
        background-color: #f2f2f2;
        font-family: Arial, sans-serif;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
        margin: 0;
    }

    .error-container {
        text-align: center;
        /* background-color: #fff; */
        background: url("{{ asset('./images/404_photo-transformed.jpg') }}");
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    h1 {
        font-size: 120px;
        margin: 0;
        color: #fecb10;
    }

    p {
        font-size: 24px;
        margin: 10px 0;
    }

    a {
         /*display: inline-block;
        padding: 10px 20px;
        margin-top: 20px;
        background-color: #3498db;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s; */
        margin-left: 10px;
    /* min-width: 194px; */
    display: inline-block;
    background: linear-gradient(270deg, #fecb10 0, #fecb10 100%);
    border-radius: 2px;
    color: #fff;
    font-weight: 700;
    font-size: 16px;
    line-height: 22px;
    padding: 9px 20px;
    border: none;
    box-shadow: 0 2px 16px rgb(0 0 0/12%);
    border: none;
    }

    a:hover {
        background-color: #2980b9;
    }
    </style>
</head>

<body>
    <div class="error-container">
        <h1>404</h1>
        <p style="font-weight: 600;">Oops! Page not found</p>
        <p>We're sorry, the page you are looking for might have been removed or doesn't exist.</p>
        <a href="/">Back to Home</a>
    </div>
    <script>
    Redirect to the homepage after 5 seconds
    setTimeout(function() {
        window.location.href = "/";
    }, 5000);
    </script>
</body>

</html>