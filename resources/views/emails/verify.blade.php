<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
    <style>
        /* Inline Bootstrap CSS */
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #007bff;
            border-radius: 5px;
            text-decoration: none;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .text-center {
            text-align: center;
        }
        .header {
            background-color: #007bff;
            color: white;
            padding: 20px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            text-align: center;
        }
        .content {
            padding: 30px;
            background-color: #f8f9fa;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <h1>Email Verification</h1>
    </div>

    <div class="content">
        <p>Hello,</p>
        <p>Thank you for registering with our service! Please verify your email address by clicking the button below:</p>

        <div class="text-center">
            <a href="{{ url('/api/verify/' . $token) }}" class="btn">Verify Email</a>
        </div>

        <p>If you did not create an account, no further action is required.</p>

        <p>Thank you,<br>The Team</p>
    </div>
</div>

</body>
</html>
