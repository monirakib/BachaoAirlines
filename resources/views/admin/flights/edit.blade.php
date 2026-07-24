@extends('admin.layouts.app')

@section('title', 'Edit Flight')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Edit Flight: {{ $flight->Flight_ID }}</h2>
        <a href="{{ route('admin.flights') }}" class="btn btn-secondary btn-sm">
            <i class="fas fa-arrow-left"></i> Back to Flights
        </a>
    </div>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.flights.update', $flight->Flight_ID) }}">
                @csrf
                @method('PUT')
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label">From</label>
                        <input type="text" name="from" class="form-control" value="{{ old('from', $flight->Flight_from) }}" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">To</label>
                        <input type="text" name="to" class="form-control" value="{{ old('to', $flight->Flight_to) }}" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Price</label>
                        <input type="number" name="price" class="form-control" value="{{ old('price', $flight->Price) }}" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Start Date</label>
                        <input type="date" name="start_date" class="form-control" value="{{ old('start_date', $flight->Start_date) }}" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Land Date</label>
                        <input type="date" name="land_date" class="form-control" value="{{ old('land_date', $flight->Land_date) }}" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Duration</label>
                        <input type="text" name="duration" class="form-control" value="{{ old('duration', $flight->Duration) }}" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Start Time</label>
                        <input type="time" name="start_time" class="form-control" value="{{ old('start_time', $flight->Start_time) }}" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">End Time</label>
                        <input type="time" name="end_time" class="form-control" value="{{ old('end_time', $flight->End_time) }}" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Update Flight</button>
            </form>
        </div>
    </div>
</div>
@endsection
