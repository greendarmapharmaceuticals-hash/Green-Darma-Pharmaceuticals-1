@extends('layouts.app')

@section('title', 'About Us | Green Darma Pharmaceuticals')
@section('meta_description', 'Learn about Green Darma Pharmaceuticals company overview, vision, clinical quality commitment, and pharmaceutical manufacturing standards in Bangladesh.')

@section('content')

<!-- Header Banner -->
<section class="bg-white border-bottom py-5">
    <div class="container text-center max-w-3xl mx-auto py-3">
        <span class="badge bg-success-subtle text-success fw-bold px-3 py-2 rounded-pill fs-7 mb-2">Corporate Profile</span>
        <h1 class="display-5 fw-extrabold text-dark brand-font mb-3">About Green Darma Pharmaceuticals</h1>
        <p class="lead text-secondary mb-0">
            Dedicated to advancing human health through bioequivalent formulations, rigorous clinical research, and accessible healthcare solutions.
        </p>
    </div>
</section>

<!-- Company History & Philosophy -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-12 col-lg-6">
                <span class="text-success fw-bold text-uppercase fs-8">Our Philosophy</span>
                <h2 class="fw-bold text-dark brand-font mb-3">Pioneering Quality Healthcare Formulations in Bangladesh</h2>
                <p class="text-secondary lh-lg mb-3">
                    {{ $company->about ?? 'Green Darma Pharmaceuticals is a progressive healthcare company focused on producing clinical-grade pharmaceutical preparations. We specialize in medicated dermatological care, gut microbiome probiotic formulations, pediatric nutritional support, and bone mineral health.' }}
                </p>
                <p class="text-secondary lh-lg">
                    Every product in our pipeline is benchmarked against exact active ingredients registered with DGDA Bangladesh, ensuring that physicians, pharmacists, and patients receive bioequivalent therapeutic results.
                </p>
            </div>
            <div class="col-12 col-lg-6 text-center">
                <div class="card card-custom p-5 bg-white border text-center">
                    <i class="bi bi-building display-1 text-success mb-3"></i>
                    <h4 class="fw-bold text-dark mb-2">Quality Assurance Commitment</h4>
                    <p class="text-muted fs-7 mb-0">Operating under strict Good Manufacturing Practice (GMP) guidelines to guarantee safety, purity, and therapeutic potency.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Mission & Vision Cards -->
<section class="py-5 bg-white">
    <div class="container">
        <div class="row g-4">
            <div class="col-12 col-md-6">
                <div class="card card-custom p-4 border-start border-success border-4 h-100">
                    <div class="bg-success-subtle text-success p-3 rounded-circle d-inline-flex mb-3" style="width: 50px; height: 50px;">
                        <i class="bi bi-bullseye fs-4"></i>
                    </div>
                    <h4 class="fw-bold text-dark brand-font mb-2">Our Mission</h4>
                    <p class="text-secondary mb-0">
                        To manufacture and market high-quality, bioequivalent pharmaceutical products that improve patient well-being, support medical practitioners with evidence-based formulations, and make clinical healthcare accessible across all regions of Bangladesh.
                    </p>
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="card card-custom p-4 border-start border-primary border-4 h-100">
                    <div class="bg-primary-subtle text-primary p-3 rounded-circle d-inline-flex mb-3" style="width: 50px; height: 50px;">
                        <i class="bi bi-eye fs-4"></i>
                    </div>
                    <h4 class="fw-bold text-dark brand-font mb-2">Our Vision</h4>
                    <p class="text-secondary mb-0">
                        To become Bangladesh’s most trusted pharmaceutical partner in specialized dermatology, gastroenterology, pediatrics, and preventive healthcare by continuously innovating product lines and adhering to global pharmaceutical standards.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Core Values Grid -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center max-w-2xl mx-auto mb-5">
            <span class="text-success fw-bold text-uppercase fs-8">Guided By Principle</span>
            <h2 class="fw-bold text-dark brand-font">Our Core Operating Values</h2>
        </div>

        <div class="row g-4">
            <div class="col-12 col-md-4">
                <div class="card card-custom p-4 text-center h-100 bg-white">
                    <i class="bi bi-award fs-1 text-success mb-2"></i>
                    <h5 class="fw-bold text-dark mb-2">Uncompromised Quality</h5>
                    <p class="text-muted fs-7 mb-0">Rigorous batch stability testing, purity checks, and active ingredient verification.</p>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="card card-custom p-4 text-center h-100 bg-white">
                    <i class="bi bi-file-medical fs-1 text-success mb-2"></i>
                    <h5 class="fw-bold text-dark mb-2">Clinical Integrity</h5>
                    <p class="text-muted fs-7 mb-0">Transparent medical literature, comprehensive pharmacology data, and clear safety disclosures.</p>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="card card-custom p-4 text-center h-100 bg-white">
                    <i class="bi bi-heart-pulse fs-1 text-success mb-2"></i>
                    <h5 class="fw-bold text-dark mb-2">Patient Centricity</h5>
                    <p class="text-muted fs-7 mb-0">Engineering easy-to-use dosage forms and gentle formulations tailored for patient compliance.</p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
