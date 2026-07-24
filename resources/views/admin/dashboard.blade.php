@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
    <h2 class="mb-4">Dashboard Overview</h2>

    <div class="row">
        <div class="col-md-3">
            <div class="stats-card">
                <h4>Total Users</h4>
                <p class="h2">{{ number_format($stats['total_users']) }}</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats-card">
                <h4>Total Bookings</h4>
                <p class="h2">{{ number_format($stats['total_bookings']) }}</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats-card">
                <h4>Base Revenue</h4>
                <p class="h2">৳{{ number_format($stats['base_revenue']) }}</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats-card">
                <h4>Insurance Revenue</h4>
                <p class="h2">৳{{ number_format($stats['insurance_revenue']) }}</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="stats-card">
                <h4>Total Revenue</h4>
                <p class="h2">৳{{ number_format($stats['total_revenue']) }}</p>
            </div>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-md-6">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <a href="{{ route('admin.flights') }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-plus"></i> Add New Flight
                </a>
                <a href="{{ route('admin.users') }}" class="btn btn-secondary btn-sm">
                    <i class="fas fa-user-plus"></i> Manage Users
                </a>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5>Recent Flights</h5>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Flight ID</th>
                                <th>Route</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($stats['recent_flights'] as $flight)
                            <tr>
                                <td>{{ $flight->Flight_ID }}</td>
                                <td>{{ $flight->Flight_from }} &rarr; {{ $flight->Flight_to }}</td>
                                <td>৳{{ number_format($flight->Price) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5>Recent Users</h5>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($stats['recent_users'] as $user)
                            <tr>
                                <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                                <td>{{ $user->email }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5>Recent Bookings</h5>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>User</th>
                                <th>Flight</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($stats['recent_bookings'] as $booking)
                            <tr>
                                <td>{{ $booking->id }}</td>
                                <td>{{ $booking->user->first_name }} {{ $booking->user->last_name }}</td>
                                <td>{{ $booking->flight->Flight_ID }}</td>
                                <td>৳{{ number_format($booking->total_amount, 2) }}</td>
                                <td>{{ $booking->status }}</td>
                                <td>{{ $booking->created_at->format('M d, Y') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
