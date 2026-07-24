@extends('admin.layouts.app')

@section('title', 'Manage Flights')

@section('content')
<div class="container-fluid">
    <h2 class="mb-4">Manage Flights</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card mb-4">
        <div class="card-header">
            <h5>Add New Flight</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.flights.store') }}">
                @csrf
                <div class="row g-3">
                    <div class="col-md-3">
                        <label class="form-label">Flight ID</label>
                        <input type="text" name="flight_id" class="form-control" value="{{ old('flight_id') }}" required>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">From</label>
                        <input type="text" name="from" class="form-control" value="{{ old('from') }}" required>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">To</label>
                        <input type="text" name="to" class="form-control" value="{{ old('to') }}" required>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Price</label>
                        <input type="number" name="price" class="form-control" value="{{ old('price') }}" required>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Start Date</label>
                        <input type="date" name="start_date" class="form-control" value="{{ old('start_date') }}" required>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Landing Date</label>
                        <input type="date" name="land_date" class="form-control" value="{{ old('land_date') }}" required>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Start Time</label>
                        <input type="time" name="start_time" class="form-control" value="{{ old('start_time') }}" required>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">End Time</label>
                        <input type="time" name="end_time" class="form-control" value="{{ old('end_time') }}" required>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Duration</label>
                        <input type="text" name="duration" class="form-control" placeholder="e.g. 45min" value="{{ old('duration') }}" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Add Flight</button>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h5>All Flights</h5>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Flight ID</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Start Date</th>
                        <th>Land Date</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Duration</th>
                        <th>Type</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($flights as $flight)
                        <tr>
                            <td>{{ $flight->Flight_ID }}</td>
                            <td>{{ $flight->Flight_from }}</td>
                            <td>{{ $flight->Flight_to }}</td>
                            <td>{{ $flight->Start_date }}</td>
                            <td>{{ $flight->Land_date }}</td>
                            <td>{{ $flight->Start_time }}</td>
                            <td>{{ $flight->End_time }}</td>
                            <td>{{ $flight->Duration }}</td>
                            <td>{{ $flight->Type }}</td>
                            <td>৳{{ number_format($flight->Price) }}</td>
                            <td>
                                <a href="{{ route('admin.flights.edit', $flight->Flight_ID) }}" class="btn btn-sm btn-info">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.flights.destroy', $flight->Flight_ID) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this flight?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
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
