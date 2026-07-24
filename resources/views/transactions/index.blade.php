<!DOCTYPE html>
<html>
<head>
    <title>My Bookings - Bachao Airlines</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Murecho:wght@100..900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Murecho', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
        }

        .header1 {
            background: linear-gradient(to right, #5c6bc0, #2da0a8);
            padding: 20px 50px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 100;
            box-sizing: border-box;
        }

        .header1 a {
            color: white;
            text-decoration: none;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .container {
            max-width: 900px;
            margin: 130px auto 40px;
            padding: 0 20px;
        }

        h1 {
            color: #2c3e50;
            margin-bottom: 30px;
        }

        .booking-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            padding: 25px;
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }

        .booking-route {
            font-size: 1.2em;
            font-weight: 700;
            color: #2c3e50;
        }

        .booking-meta {
            color: #666;
            font-size: 0.9em;
            margin-top: 5px;
        }

        .booking-amount {
            font-size: 1.3em;
            font-weight: 700;
            color: #2da0a8;
        }

        .status-badge {
            display: inline-block;
            padding: 5px 15px;
            border-radius: 15px;
            font-size: 0.85em;
            font-weight: 600;
            background: #fff3cd;
            color: #856404;
            text-transform: capitalize;
        }

        .view-btn {
            padding: 10px 20px;
            border-radius: 10px;
            background: linear-gradient(to right, #5c6bc0, #2da0a8);
            color: white;
            text-decoration: none;
            font-weight: 600;
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
            background: white;
            border-radius: 15px;
        }

        .pagination {
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <nav class="header1">
        <a href="{{ route('dashboard') }}"><i class="fas fa-home"></i> Dashboard</a>
    </nav>

    <div class="container">
        <h1>My Bookings</h1>

        @forelse($transactions as $transaction)
            <div class="booking-card">
                <div>
                    <div class="booking-route">
                        {{ $transaction->flight->Flight_from ?? '' }} &rarr; {{ $transaction->flight->Flight_to ?? '' }}
                    </div>
                    <div class="booking-meta">
                        Booking #{{ $transaction->id }} &middot; Seat {{ $transaction->seat_number }} &middot;
                        <span class="status-badge">{{ $transaction->status }}</span>
                    </div>
                </div>
                <div class="booking-amount">৳{{ number_format($transaction->total_amount, 2) }}</div>
                <a href="{{ route('transaction.confirmation', $transaction->id) }}" class="view-btn">View Ticket</a>
            </div>
        @empty
            <div class="empty-state">
                <p>You haven't booked any flights yet.</p>
                <a href="{{ route('dashboard') }}" class="view-btn">Browse Flights</a>
            </div>
        @endforelse

        <div class="pagination">
            {{ $transactions->links() }}
        </div>
    </div>
</body>
</html>
