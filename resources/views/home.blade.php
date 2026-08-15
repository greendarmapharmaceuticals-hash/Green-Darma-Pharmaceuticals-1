@extends('layouts.app')

@section('title', 'Green Darma Pharmaceuticals | Clinical Excellence & Healthcare Innovation')
@section('meta_description', 'Green Darma Pharmaceuticals is a leading pharmaceutical company in Bangladesh, delivering DGDA certified medicated soaps, lotions, shampoos, and clinical preparations including Scabicod Soap, Tinea Soap, SCABVAR Lotion, Greenstar Shampoo, and X-Corel G Tablet.')
@section('meta_keywords', 'Green Darma Pharmaceuticals, Scabicod Soap, Tinea Soap, SCABVAR Lotion, Greenstar Shampoo, X-Corel G Tablet, Permethrin soap, Luliconazole soap, anti-scabies lotion, Bangladesh pharmaceuticals')

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
                    <div class="bg-success-subtle p-4 p-md-5 rounded-circle d-inline-flex align-items-center justify-content-center shadow-sm" style="width: 220px; height: 220px;">
                        @if($companySetting?->logo)
                            <img src="{{ asset($companySetting->logo) }}" alt="Green Darma Logo" class="img-fluid" style="max-height: 140px; width: auto; object-fit: contain;">
                        @else
                            <i class="bi bi-capsule-capsule display-1 text-success"></i>
                        @endif
                    </div>
                </div>
            </div>
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

@endsection
