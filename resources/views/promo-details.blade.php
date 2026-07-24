<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promotion Details - Bachao Airlines</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #f6f9fc 0%, #e9f2ff 100%);
            min-height: 100vh;
        }

        .container {
            max-width: 800px;
            margin: 40px auto;
            padding: 30px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .promo-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .promo-code {
            background: #FF8C00;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 24px;
            display: inline-block;
            margin: 20px 0;
        }

        .terms {
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid #ddd;
        }

        .terms h3 {
            color: #333;
        }

        .terms ul {
            padding-left: 20px;
        }

        .terms li {
            margin: 10px 0;
            color: #666;
        }

        .back-btn {
            position: fixed;
            top: 20px;
            left: 20px;
            background: rgba(255, 140, 0, 0.9);
            color: white;
            padding: 12px 25px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 700;
            transition: all 0.3s ease;
        }

        .back-btn:hover {
            transform: translateX(-5px);
            background: #FF8C00;
        }
    </style>
</head>
<body>
    <a href="{{ route('promo') }}" class="back-btn">
        <i class="fas fa-arrow-left"></i> Back to Promotions
    </a>

    <div class="container">
        @if($promo)
            <div class="promo-header">
                <h1>{{ $promo['title'] }}</h1>
                <div class="promo-code">{{ $promoCode }}</div>
                <p>{{ $promo['description'] }}</p>
            </div>

            <div class="terms">
                <h3>Terms &amp; Conditions</h3>
                <ul>
                    @foreach($promo['terms'] as $term)
                        <li>{{ $term }}</li>
                    @endforeach
                    <li>Bachao Airlines reserves the right to modify or cancel this offer without prior notice</li>
                    <li>All standard Bachao Airlines terms and conditions apply</li>
                </ul>
            </div>
        @else
            <div class="promo-header">
                <h1>Promo Code is not Available Right Now</h1>
                <p>The requested promotion code is not valid.</p>
            </div>
        @endif
    </div>
</body>
</html>
