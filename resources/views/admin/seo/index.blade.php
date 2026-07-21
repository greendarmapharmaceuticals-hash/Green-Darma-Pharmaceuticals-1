@extends('admin.layouts.app')

@section('title', 'SEO Manager')
@section('page-title', 'Site-Wide Search Engine Optimization (SEO)')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-1">SEO Manager</h4>
        <p class="text-muted mb-0">Configure meta titles, descriptions, keywords, and OpenGraph social cards for key static pages.</p>
    </div>
</div>

<form action="{{ route('admin.seo.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="card card-custom mb-4">
        <div class="card-header bg-white border-0 pt-3 pb-0 px-4">
            <ul class="nav nav-tabs card-header-tabs fw-bold" id="seoTabs" role="tablist">
                <li class="nav-item"><button class="nav-link active py-3 px-4" id="home-tab" data-bs-toggle="tab" data-bs-target="#tabHome" type="button"><i class="bi bi-house me-1"></i> Homepage SEO</button></li>
                <li class="nav-item"><button class="nav-link py-3 px-4" id="about-tab" data-bs-toggle="tab" data-bs-target="#tabAbout" type="button"><i class="bi bi-info-circle me-1"></i> About Page SEO</button></li>
                <li class="nav-item"><button class="nav-link py-3 px-4" id="products-tab" data-bs-toggle="tab" data-bs-target="#tabProducts" type="button"><i class="bi bi-prescription2 me-1"></i> Products Catalog SEO</button></li>
                <li class="nav-item"><button class="nav-link py-3 px-4" id="contact-tab" data-bs-toggle="tab" data-bs-target="#tabContact" type="button"><i class="bi bi-envelope me-1"></i> Contact Page SEO</button></li>
            </ul>
        </div>

        <div class="card-body p-4">
            <div class="tab-content">
                @foreach(['home' => 'Homepage', 'about' => 'About Us', 'products' => 'Products Catalog', 'contact' => 'Contact Us'] as $pageKey => $pageLabel)
                    <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="tab{{ ucfirst($pageKey) }}">
                        <h5 class="fw-bold text-success mb-3">{{ $pageLabel }} Meta Configuration</h5>
                        @php $seo = $seoSettings[$pageKey] ?? null; @endphp
                        
                        <div class="row g-3">
                            <div class="col-12">
                                <label class="form-label fw-bold">Meta Title</label>
                                <input type="text" name="pages[{{ $pageKey }}][meta_title]" class="form-control" value="{{ old("pages.{$pageKey}.meta_title", $seo?->meta_title) }}">
                            </div>

                            <div class="col-12">
                                <label class="form-label fw-medium">Meta Description</label>
                                <textarea name="pages[{{ $pageKey }}][meta_description]" class="form-control" rows="3">{{ old("pages.{$pageKey}.meta_description", $seo?->meta_description) }}</textarea>
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="form-label fw-medium">Bilingual Meta Keywords</label>
                                <input type="text" name="pages[{{ $pageKey }}][keywords]" class="form-control" value="{{ old("pages.{$pageKey}.keywords", $seo?->keywords) }}">
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="form-label fw-medium">Canonical URL</label>
                                <input type="url" name="pages[{{ $pageKey }}][canonical_url]" class="form-control" value="{{ old("pages.{$pageKey}.canonical_url", $seo?->canonical_url) }}">
                            </div>

                            <div class="col-12">
                                <label class="form-label fw-medium">OpenGraph Social Preview Image</label>
                                @if($seo?->og_image && file_exists(public_path($seo->og_image)))
                                    <div class="mb-2"><img src="{{ asset($seo->og_image) }}" class="img-thumbnail" style="max-height: 80px;"></div>
                                @endif
                                <input type="file" name="pages[{{ $pageKey }}][og_image]" class="form-control" accept="image/*">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="card-footer bg-light p-3 d-flex justify-content-end">
            <button type="submit" class="btn btn-gdp btn-lg-custom">
                <i class="bi bi-check-circle me-2"></i> Save All SEO Settings
            </button>
        </div>
    </div>
</form>

@endsection
