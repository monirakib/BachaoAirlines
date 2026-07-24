@extends('admin.layouts.app')

@section('title', 'View Booking')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Booking #{{ $booking->id }}</h2>
        <div>
            <a href="{{ route('admin.bookings') }}" class="btn btn-secondary btn-sm">
                <i class="fas fa-arrow-left"></i> Back to Bookings
            </a>
            <button onclick="window.print()" class="btn btn-primary btn-sm">
                <i class="fas fa-print"></i> Print
            </button>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header"><h5>Flight Information</h5></div>
        <div class="card-body row g-3">
            <div class="col-md-6"><strong>Flight ID:</strong> {{ optional($booking->flight)->Flight_ID }}</div>
            <div class="col-md-6"><strong>Route:</strong> {{ optional($booking->flight)->Flight_from }} &rarr; {{ optional($booking->flight)->Flight_to }}</div>
            <div class="col-md-6"><strong>Departure:</strong> {{ optional($booking->flight)->Start_date }} {{ optional($booking->flight)->Start_time }}</div>
            <div class="col-md-6"><strong>Arrival:</strong> {{ optional($booking->flight)->Land_date }} {{ optional($booking->flight)->End_time }}</div>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header"><h5>Passenger Information</h5></div>
        <div class="card-body row g-3">
            <div class="col-md-6"><strong>Name:</strong> {{ $booking->passenger_name }}</div>
            <div class="col-md-6"><strong>Email:</strong> {{ $booking->email }}</div>
            <div class="col-md-6"><strong>Phone:</strong> {{ $booking->phone }}</div>
            <div class="col-md-6"><strong>Passport:</strong> {{ $booking->passport_number }}</div>
            <div class="col-md-6"><strong>Seat:</strong> {{ $booking->seat_number }} ({{ $booking->seat_type }})</div>
        </div>
    </div>

    <div class="card">
        <div class="card-header"><h5>Payment</h5></div>
        <div class="card-body row g-3">
            <div class="col-md-6"><strong>Base Fare:</strong> ৳{{ number_format($booking->amount) }}</div>
            <div class="col-md-6"><strong>Insurance:</strong> ৳{{ number_format($booking->insurance_amount) }}</div>
            <div class="col-md-6"><strong>Total:</strong> ৳{{ number_format($booking->total_amount) }}</div>
            <div class="col-md-6"><strong>Payment Method:</strong> {{ $booking->payment_method }}</div>
        </div>
    </div>
</div>
@endsection
