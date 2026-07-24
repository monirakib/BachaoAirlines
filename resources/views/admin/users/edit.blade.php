@extends('admin.layouts.app')

@section('title', 'Edit User')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Edit User: {{ $user->first_name }} {{ $user->last_name }}</h2>
        <a href="{{ route('admin.users') }}" class="btn btn-secondary btn-sm">
            <i class="fas fa-arrow-left"></i> Back to Users
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
            <form method="POST" action="{{ route('admin.users.update', $user->user_id) }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">First Name</label>
                    <input type="text" name="first_name" class="form-control" value="{{ old('first_name', $user->first_name) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Last Name</label>
                    <input type="text" name="last_name" class="form-control" value="{{ old('last_name', $user->last_name) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Phone</label>
                    <input type="tel" name="phone" class="form-control" value="{{ old('phone', $user->phone) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">User Type</label>
                    @php $isSelf = $user->user_id === auth()->id(); @endphp
                    <select name="user_type" class="form-select" {{ $isSelf ? 'disabled' : '' }}>
                        <option value="Customer" {{ $user->user_type === 'Customer' ? 'selected' : '' }}>Customer</option>
                        <option value="Admin" {{ $user->user_type === 'Admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                    @if($isSelf)
                        <div class="form-text">Cannot change your own user type</div>
                        <input type="hidden" name="user_type" value="{{ $user->user_type }}">
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Update User</button>
            </form>
        </div>
    </div>
</div>
@endsection
