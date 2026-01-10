<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - Expense Note</title>
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <style>
        body, html {
            height: 100%;
            margin: 0;
        }
        .welcome-container {
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
        }
        h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
        }
        p {
            font-size: 1.2rem;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="welcome-container">
        <div>
            <h1>Welcome to Your Expense Note</h1>
            <p>Track your expenses easily and stay on top of your budget.</p>
        </div>
    </div>
</body>
</html>
