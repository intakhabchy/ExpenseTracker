<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Tracker - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f5f6fa;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            width: 100%;
            max-width: 400px;
            padding: 2rem;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        .login-card h3 {
            text-align: center;
            margin-bottom: 1.5rem;
        }
        .btn-primary {
            width: 100%;
            background-color: #0d6efd;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0b5ed7;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <h3>Expense Tracker</h3>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" required autofocus>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember" class="ms-1">Remember me</label>
                </div>
                <a href="{{ route('password.request') }}">Forgot?</a>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
        <div class="text-center mt-3">
            <small>Don’t have an account? <a href="{{ route('register') }}">Sign up</a></small>
        </div>
    </div>
</body>
</html>
