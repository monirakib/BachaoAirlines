@extends('admin.layouts.app')

@section('title', 'Manage Bookings')

@section('content')
<div class="container-fluid">
    <h2 class="mb-4">Manage Bookings</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Booking ID</th>
                        <th>Flight Info</th>
                        <th>Passenger</th>
                        <th>Contact</th>
                        <th>Seat</th>
                        <th>Amount</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookings as $booking)
                        <tr>
                            <td>#{{ $booking->id }}</td>
                            <td>
                                {{ $booking->flight->Flight_ID ?? $booking->flight_id }}<br>
                                <small>{{ $booking->flight->Flight_from ?? '' }} &rarr; {{ $booking->flight->Flight_to ?? '' }}</small>
                            </td>
                            <td>{{ $booking->user->first_name ?? '' }} {{ $booking->user->last_name ?? '' }}</td>
                            <td>
                                {{ $booking->email }}<br>
                                <small>{{ $booking->phone }}</small>
                            </td>
                            <td>{{ $booking->seat_number }}</td>
                            <td>৳{{ number_format($booking->amount) }}</td>
                            <td>{{ optional($booking->flight)->Start_date }}</td>
                            <td>
                                <a href="{{ route('admin.bookings.show', $booking->id) }}" class="btn btn-sm btn-info">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <form action="{{ route('admin.bookings.cancel', $booking->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to cancel this booking?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
