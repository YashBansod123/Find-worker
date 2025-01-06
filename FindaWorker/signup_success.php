<?php
// signup_success.php

// You can redirect the user to the login page after some seconds
header("refresh:3; url=login.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Successful</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f8ff;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            text-align: center;
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        .container h1 {
            color: #4CAF50;
            font-size: 32px;
        }

        .message {
            font-size: 18px;
            color: #333;
            margin-bottom: 20px;
        }

        .redirect {
            font-size: 16px;
            color: #007BFF;
            text-decoration: none;
            border: 1px solid #007BFF;
            padding: 10px 20px;
            border-radius: 5px;
            margin-top: 20px;
        }

        .redirect:hover {
            background-color: #007BFF;
            color: white;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Signup Successful!</h1>
        <p class="message">You can now log in to your account.</p>
        <a href="loginSignup.html" class="redirect">Go to Login Page</a>
    </div>

</body>
</html>
