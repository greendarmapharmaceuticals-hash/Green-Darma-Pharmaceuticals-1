@extends('layouts.app')

@section('title', 'Green Darma Pharmaceuticals | Clinical Excellence & Healthcare Innovation')

@section('content')

<!-- HERO BANNER SECTION -->
<section class="py-5 bg-white border-bottom position-relative overflow-hidden">
    <div class="container py-4">
        <div class="row align-items-center g-5">
            <div class="col-12 col-lg-7">
                <div class="badge bg-success-subtle text-success fw-bold px-3 py-2 rounded-pill mb-3 fs-7">
                    <i class="bi bi-shield-check me-1"></i> DGDA Registered & Generic Benchmarked
                </div>
                <h1 class="display-4 fw-extrabold text-dark brand-font lh-sm mb-3">
                    Advancing Healthcare Through <span class="text-success">Clinical Innovation</span>
                </h1>
                <p class="lead text-secondary mb-4">
                    Green Darma Pharmaceuticals delivers evidence-based therapeutic formulations, medicated dermatological soaps, probiotic supplements, and essential pediatric care across Bangladesh.
                </p>

                <div class="d-flex flex-wrap gap-3 mb-4">
                    <a href="{{ route('products.index') }}" class="btn btn-gdp-primary btn-lg shadow-sm">
                        <i class="bi bi-prescription2 me-2"></i> Explore Product Line
                    </a>
                    <a href="{{ route('about') }}" class="btn btn-outline-secondary btn-lg">
                        <i class="bi bi-building me-2"></i> About Our Company
                    </a>
                </div>

                <div class="row g-3 pt-3 border-top">
                    <div class="col-4">
                        <div class="fw-bold text-dark fs-4 brand-font">100%</div>
                        <div class="fs-8 text-muted">Quality Compliance</div>
                    </div>
                    <div class="col-4">
                        <div class="fw-bold text-dark fs-4 brand-font">8 SKU</div>
                        <div class="fs-8 text-muted">Flagship Formulations</div>
                    </div>
                    <div class="col-4">
                        <div class="fw-bold text-dark fs-4 brand-font">DGDA</div>
                        <div class="fs-8 text-muted">Active Formulations</div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-5 text-center">
                <div class="position-relative d-inline-block">
                    <div class="bg-success-subtle p-5 rounded-circle d-inline-block">
                        <i class="bi bi-heart-pulse display-1 text-success"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CATEGORIES SHOWCASE SECTION -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center max-w-2xl mx-auto mb-5">
            <span class="text-success fw-bold text-uppercase fs-8 letter-spacing">Therapeutic Focus Areas</span>
            <h2 class="fw-bold text-dark brand-font">Specialized Healthcare Product Lines</h2>
        </div>

        <div class="row g-4">
            @foreach($categories as $category)
                <div class="col-12 col-sm-6 col-md-4 col-lg">
                    <a href="{{ route('products.index', ['category' => $category->slug]) }}" class="card card-custom p-4 text-center text-decoration-none h-100 border hover-lift">
                        <div class="bg-success-subtle text-success p-3 rounded-circle d-inline-flex mx-auto mb-3">
                            @if(Str::contains($category->slug, 'dermatology'))
                                <i class="bi bi-droplet fs-2"></i>
                            @elseif(Str::contains($category->slug, 'gastro'))
                                <i class="bi bi-capsule fs-2"></i>
                            @elseif(Str::contains($category->slug, 'pediatric'))
                                <i class="bi bi-emoji-smile fs-2"></i>
                            @elseif(Str::contains($category->slug, 'ortho'))
                                <i class="bi bi-activity fs-2"></i>
                            @else
                                <i class="bi bi-heart-pulse fs-2"></i>
                            @endif
                        </div>
                        <h6 class="fw-bold text-dark mb-1">{{ $category->name }}</h6>
                        <small class="text-muted fs-8">{{ $category->products_count }} Registered SKUs</small>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- FEATURED PRODUCTS SECTION -->
<section class="py-5 bg-white">
    <div class="container">
        <div class="d-flex flex-wrap justify-content-between align-items-end mb-4">
            <div>
                <span class="text-success fw-bold text-uppercase fs-8">Featured Formulations</span>
                <h2 class="fw-bold text-dark brand-font mb-0">Flagship Pharmaceutical Preparations</h2>
            </div>
            <a href="{{ route('products.index') }}" class="btn btn-outline-success fw-semibold">View All Products <i class="bi bi-arrow-right"></i></a>
        </div>

        <div class="row g-4">
            @foreach($featuredProducts as $product)
                <div class="col-12 col-sm-6 col-lg-4">
                    <x-product-card :product="$product" />
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- WHY CHOOSE US TRUST SIGNALS -->
<section class="py-5 bg-dark text-white">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-12 col-lg-5">
                <span class="text-success fw-bold text-uppercase fs-8">Why Green Darma</span>
                <h2 class="fw-bold text-white brand-font mb-3">Uncompromised Clinical Standards & Therapeutic Integrity</h2>
                <p class="text-slate-400 mb-4">
                    Every pharmaceutical preparation under the Green Darma portfolio undergoes rigorous active ingredient verification, generic benchmarking, and manufacturing quality control.
                </p>
                <a href="{{ route('about') }}" class="btn btn-success fw-bold px-4">Read Company Profile</a>
            </div>

            <div class="col-12 col-lg-7">
                <div class="row g-4">
                    <div class="col-12 col-sm-6">
                        <div class="card bg-secondary bg-opacity-25 border-0 p-4 h-100 text-white">
                            <i class="bi bi-award fs-1 text-success mb-2"></i>
                            <h5 class="fw-bold mb-1">Standardized Bioavailability</h5>
                            <p class="text-slate-400 fs-7 mb-0">Formulated with exact active ingredients registered with DGDA Bangladesh for optimal therapeutic outcome.</p>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6">
                        <div class="card bg-secondary bg-opacity-25 border-0 p-4 h-100 text-white">
                            <i class="bi bi-microscope fs-1 text-success mb-2"></i>
                            <h5 class="fw-bold mb-1">Clinical Verification</h5>
                            <p class="text-slate-400 fs-7 mb-0">Detailed pharmacological documentation, dosage instructions, and safety contraindications for healthcare professionals.</p>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6">
                        <div class="card bg-secondary bg-opacity-25 border-0 p-4 h-100 text-white">
                            <i class="bi bi-shield-check fs-1 text-success mb-2"></i>
                            <h5 class="fw-bold mb-1">Patient Safety First</h5>
                            <p class="text-slate-400 fs-7 mb-0">Clear medical disclosures, storage parameters, and patient information guidelines built into every SKU profile.</p>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6">
                        <div class="card bg-secondary bg-opacity-25 border-0 p-4 h-100 text-white">
                            <i class="bi bi-people fs-1 text-success mb-2"></i>
                            <h5 class="fw-bold mb-1">Healthcare Partner</h5>
                            <p class="text-slate-400 fs-7 mb-0">Trusted reference for doctors, pharmacists, hospitals, clinics, and pharmaceutical distributors across Bangladesh.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CONTACT CTA SECTION -->
<section class="py-5 bg-white">
    <div class="container text-center max-w-3xl mx-auto py-3">
        <div class="bg-success-subtle p-5 rounded-4 border border-success border-opacity-25">
            <i class="bi bi-headset display-4 text-success mb-3 d-block"></i>
            <h2 class="fw-bold text-dark brand-font mb-2">Inquire About Our Products or Distributorship</h2>
            <p class="text-secondary mb-4 fs-6">
                Are you a doctor, pharmacist, hospital administrator, or pharmaceutical distributor seeking details about Green Darma products? Contact our team today.
            </p>
            <a href="{{ route('contact') }}" class="btn btn-gdp-primary btn-lg shadow-sm">
                <i class="bi bi-envelope me-2"></i> Send Official Inquiry
            </a>
        </div>
    </div>
</section>

@endsection
