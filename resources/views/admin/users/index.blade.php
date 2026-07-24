@extends('admin.layouts.app')

@section('title', 'Manage Users')

@section('content')
<div class="container-fluid">
    <h2 class="mb-4">Manage Users</h2>

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
                        <th>User ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Type</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        @php
                            $isAdmin = $user->user_type === 'Admin';
                            $isCurrentUser = $user->user_id === auth()->id();
                            $canDelete = !$isAdmin && !$isCurrentUser;
                        @endphp
                        <tr class="{{ $isAdmin ? 'table-dark' : '' }}">
                            <td>#{{ $user->user_id }}</td>
                            <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>
                                <span class="badge {{ $isAdmin ? 'bg-dark' : 'bg-info' }}">{{ $user->user_type }}</span>
                            </td>
                            <td>
                                <a href="{{ route('admin.users.edit', $user->user_id) }}" class="btn btn-sm btn-info">
                                    <i class="fas fa-edit"></i>
                                </a>
                                @if($canDelete)
                                    <form action="{{ route('admin.users.destroy', $user->user_id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this user?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                @else
                                    <button class="btn btn-sm btn-danger disabled" title="{{ $isAdmin ? 'Cannot delete admin users' : 'Cannot delete your own account' }}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
