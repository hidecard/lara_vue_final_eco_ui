<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FreshCart Reset Email</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            background-color: #f8f9fa;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
        }

        .header {
            text-align: center;
            padding: 10px 0;
        }

        .header img {
            max-width: 150px;
        }

        .content {
            padding: 20px;
            text-align: center;
        }

        .otp-code {
            font-size: 24px;
            font-weight: bold;
            background: #f0f0f5;
            padding: 15px;
            border-radius: 8px;
            margin: 20px 0;
        }

        .cta-button {
            display: inline-block;
            padding: 12px 20px;
            color: #fff;
            background-color: #28a745;
            border-radius: 5px;
            text-decoration: none;
        }

        .footer {
            text-align: center;
            font-size: 12px;
            color: #aaa;
            padding-top: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <img src="{{ asset('images/freshcart-logo.svg') }}" alt="Your Logo">
        </div>

        <!-- Main Content -->
        <div class="content">
            <h2>Password Reset Successfull</h2>
            <p>Hello, please use the passwrd below to login in your account:</p>
            <div class="otp-code">{{ $password }}</div>
            <p>After login update your password from profile setting</p>
            <p>If you did not request this code, please ignore this email.</p>
            <a href="//127.0.0.1:8000" class="cta-button">Verify Now</a>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>Need help? <a href="mailto:support@freshcart.com">Contact Support</a></p>
            <p>© {{ date('Y') }} FreshCart. All rights reserved.</p>
        </div>
    </div>
</body>

</html>
