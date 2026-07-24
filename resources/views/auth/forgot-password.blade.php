<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - BachaoAirlines</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Montserrat', sans-serif;
        }

        body {
            background: linear-gradient(to right, #e2e2e2, #c9d6ff);
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            border-radius: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.35);
            width: 420px;
            max-width: 100%;
            padding: 40px;
        }

        h1 {
            margin-bottom: 15px;
        }

        p.subtitle {
            font-size: 14px;
            color: #666;
            margin-bottom: 25px;
        }

        input {
            background-color: #eee;
            border: none;
            margin: 8px 0;
            padding: 10px 15px;
            font-size: 13px;
            border-radius: 8px;
            width: 100%;
            outline: none;
        }

        button {
            background-color: #2da0a8;
            color: #fff;
            font-size: 12px;
            padding: 10px 45px;
            border: 1px solid transparent;
            border-radius: 8px;
            font-weight: 600;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            margin-top: 15px;
            cursor: pointer;
            width: 100%;
        }

        a {
            display: inline-block;
            color: #333;
            font-size: 13px;
            text-decoration: none;
            margin-top: 20px;
        }

        .alert {
            padding: 12px 15px;
            border-radius: 8px;
            font-size: 13px;
            margin-bottom: 15px;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
        }

        .alert-danger {
            background: #f8d7da;
            color: #721c24;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Forgot Password?</h1>
        <p class="subtitle">Enter your email address and we'll send you a link to reset your password.</p>

        @if(session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
            <button type="submit">Send Reset Link</button>
        </form>

        <a href="{{ route('login') }}"><i class="fas fa-arrow-left"></i> Back to Login</a>
    </div>
</body>
</html>
