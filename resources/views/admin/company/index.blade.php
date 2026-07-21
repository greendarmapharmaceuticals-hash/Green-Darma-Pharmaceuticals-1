@extends('admin.layouts.app')

@section('title', 'Company Settings')
@section('page-title', 'Company Branding & Contact Details')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-1">Company Profile Settings</h4>
        <p class="text-muted mb-0">Update company logo, header contact info, address, and social links.</p>
    </div>
</div>

<form action="{{ route('admin.company.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="card card-custom p-4 mb-4">
        <h5 class="fw-bold text-success mb-3"><i class="bi bi-building me-2"></i> Branding & Logos</h5>
        
        <div class="row g-3 mb-4">
            <div class="col-12 col-md-6">
                <label class="form-label fw-bold">Company Name</label>
                <input type="text" name="company_name" class="form-control form-control-lg" value="{{ old('company_name', $settings->company_name) }}" required>
            </div>
            
            <div class="col-12 col-md-3">
                <label class="form-label fw-bold">Company Logo</label>
                @if($settings->logo && file_exists(public_path($settings->logo)))
                    <div class="mb-2"><img src="{{ asset($settings->logo) }}" class="img-thumbnail" style="max-height: 50px;"></div>
                @endif
                <input type="file" name="logo" class="form-control" accept="image/*">
            </div>

            <div class="col-12 col-md-3">
                <label class="form-label fw-bold">Favicon Icon</label>
                @if($settings->favicon && file_exists(public_path($settings->favicon)))
                    <div class="mb-2"><img src="{{ asset($settings->favicon) }}" class="img-thumbnail" style="max-height: 40px;"></div>
                @endif
                <input type="file" name="favicon" class="form-control" accept="image/*">
            </div>
        </div>

        <h5 class="fw-bold text-success mb-3"><i class="bi bi-geo-alt me-2"></i> Contact Information</h5>
        <div class="row g-3 mb-4">
            <div class="col-12 col-md-6">
                <label class="form-label fw-medium">Phone Number</label>
                <input type="text" name="phone" class="form-control" value="{{ old('phone', $settings->phone) }}">
            </div>

            <div class="col-12 col-md-6">
                <label class="form-label fw-medium">Email Address</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $settings->email) }}">
            </div>

            <div class="col-12">
                <label class="form-label fw-medium">Corporate Office Address</label>
                <textarea name="address" class="form-control" rows="2">{{ old('address', $settings->address) }}</textarea>
            </div>

            <div class="col-12">
                <label class="form-label fw-medium">Company About Summary</label>
                <textarea name="about" class="form-control" rows="3">{{ old('about', $settings->about) }}</textarea>
            </div>
        </div>

        <h5 class="fw-bold text-success mb-3"><i class="bi bi-share me-2"></i> Social Media & Footer</h5>
        <div class="row g-3 mb-4">
            <div class="col-12 col-md-4">
                <label class="form-label fw-medium"><i class="bi bi-facebook text-primary me-1"></i> Facebook URL</label>
                <input type="url" name="facebook" class="form-control" value="{{ old('facebook', $settings->facebook) }}">
            </div>

            <div class="col-12 col-md-4">
                <label class="form-label fw-medium"><i class="bi bi-linkedin text-info me-1"></i> LinkedIn URL</label>
                <input type="url" name="linkedin" class="form-control" value="{{ old('linkedin', $settings->linkedin) }}">
            </div>

            <div class="col-12 col-md-4">
                <label class="form-label fw-medium"><i class="bi bi-youtube text-danger me-1"></i> YouTube URL</label>
                <input type="url" name="youtube" class="form-control" value="{{ old('youtube', $settings->youtube) }}">
            </div>

            <div class="col-12">
                <label class="form-label fw-medium">Footer Copyright Text</label>
                <textarea name="footer_text" class="form-control" rows="2">{{ old('footer_text', $settings->footer_text) }}</textarea>
            </div>
        </div>

        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-gdp btn-lg-custom">
                <i class="bi bi-check-circle me-2"></i> Save Company Settings
            </button>
        </div>
    </div>
</form>

@endsection
