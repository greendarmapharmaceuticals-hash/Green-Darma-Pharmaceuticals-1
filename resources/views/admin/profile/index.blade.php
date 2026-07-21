@extends('admin.layouts.app')

@section('title', 'Admin Profile')
@section('page-title', 'Profile & Account Security')

@section('content')

<div class="row g-4">
    <!-- Profile Info -->
    <div class="col-12 col-md-6">
        <div class="card card-custom p-4 h-100">
            <h5 class="fw-bold text-success mb-3"><i class="bi bi-person-circle me-2"></i> Account Profile</h5>
            <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label fw-bold">Full Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $admin->name) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Email Address</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email', $admin->email) }}" required>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-medium">Profile Photo</label>
                    @if($admin->profile_photo && file_exists(public_path($admin->profile_photo)))
                        <div class="mb-2"><img src="{{ asset($admin->profile_photo) }}" class="rounded-circle" style="width: 60px; height: 60px; object-fit: cover;"></div>
                    @endif
                    <input type="file" name="profile_photo" class="form-control" accept="image/*">
                </div>

                <button type="submit" class="btn btn-gdp"><i class="bi bi-check-circle me-1"></i> Update Profile</button>
            </form>
        </div>
    </div>

    <!-- Password Change -->
    <div class="col-12 col-md-6">
        <div class="card card-custom p-4 h-100">
            <h5 class="fw-bold text-success mb-3"><i class="bi bi-lock me-2"></i> Change Password</h5>
            <form action="{{ route('admin.password.update') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label fw-bold">Current Password</label>
                    <input type="password" name="current_password" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">New Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-bold">Confirm New Password</label>
                    <input type="password" name="password_confirmation" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-outline-danger fw-bold"><i class="bi bi-shield-lock me-1"></i> Update Password</button>
            </form>
        </div>
    </div>
</div>

@endsection
