@extends('layouts.app')

@section('title', 'About Us | Green Darma Pharmaceuticals')
@section('meta_description', 'Learn about Green Darma Pharmaceuticals company overview, vision, clinical quality commitment, and pharmaceutical manufacturing standards in Bangladesh.')

@section('content')

<!-- Unique About Hero Section -->
<section class="position-relative text-white py-5 overflow-hidden" style="background: linear-gradient(135deg, #092e24 0%, #1b4d3e 60%, #0e3d30 100%);">
    <div class="position-absolute top-0 end-0 opacity-10 me-n5 mt-n5 pointer-events-none">
        <i class="bi bi-capsule" style="font-size: 25rem; color: #ffffff;"></i>
    </div>
    <div class="container position-relative py-4 z-1 text-center max-w-4xl mx-auto">
        <span class="badge bg-success text-white border border-light border-opacity-25 px-3 py-2 rounded-pill fs-7 mb-3 shadow-sm">
            <i class="bi bi-patch-check-fill me-1"></i> Corporate Profile & Heritage
        </span>
        <h1 class="display-4 fw-extrabold mb-3 brand-font text-white" style="letter-spacing: -0.5px;">
            Pioneering Clinical Excellence in Bangladesh
        </h1>
        <p class="lead text-white-50 mb-4 fs-5 mx-auto" style="max-width: 780px;">
            Dedicated to advancing human health through bioequivalent formulations, rigorous clinical research, and accessible healthcare solutions.
        </p>
    </div>
</section>

<!-- Stats Counter Bar -->
<section class="py-4 bg-white border-bottom shadow-sm">
    <div class="container">
        <div class="row g-3 text-center">
            <div class="col-6 col-md-3">
                <div class="p-3">
                    <h2 class="display-6 fw-extrabold text-success brand-font mb-0">100%</h2>
                    <p class="text-uppercase text-muted fs-8 fw-semibold mb-0">GMP Compliant</p>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="p-3 border-start border-end">
                    <h2 class="display-6 fw-extrabold text-success brand-font mb-0">DGDA</h2>
                    <p class="text-uppercase text-muted fs-8 fw-semibold mb-0">Approved Formulations</p>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="p-3 border-end">
                    <h2 class="display-6 fw-extrabold text-success brand-font mb-0">64</h2>
                    <p class="text-uppercase text-muted fs-8 fw-semibold mb-0">Districts Network</p>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="p-3">
                    <h2 class="display-6 fw-extrabold text-success brand-font mb-0">1000+</h2>
                    <p class="text-uppercase text-muted fs-8 fw-semibold mb-0">Prescribing Doctors</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Company History & Philosophy -->
<section class="py-5" style="background-color: #f8fafc;">
    <div class="container py-3">
        <div class="row align-items-center g-5">
            <div class="col-12 col-lg-6">
                <span class="text-success fw-bold text-uppercase fs-8 tracking-wider">Our Philosophy</span>
                <h2 class="fw-extrabold text-dark brand-font mb-3 display-6">
                    Bioequivalent Quality Healthcare Formulations
                </h2>
                <p class="text-secondary lh-lg mb-3">
                    {{ $company->about ?? 'Green Darma Pharmaceuticals is a progressive healthcare company focused on producing clinical-grade pharmaceutical preparations. We specialize in medicated dermatological care, gut microbiome probiotic formulations, pediatric nutritional support, and bone mineral health.' }}
                </p>
                <p class="text-secondary lh-lg mb-4">
                    Every product in our pipeline is benchmarked against exact active ingredients registered with DGDA Bangladesh, ensuring that physicians, pharmacists, and patients receive bioequivalent therapeutic results.
                </p>
                <div class="d-flex flex-column gap-2">
                    <div class="d-flex align-items-center text-dark fw-semibold fs-7">
                        <i class="bi bi-check-circle-fill text-success fs-5 me-2"></i> Strict Batch Stability & Purity Checks
                    </div>
                    <div class="d-flex align-items-center text-dark fw-semibold fs-7">
                        <i class="bi bi-check-circle-fill text-success fs-5 me-2"></i> Formulated for Patient Safety & Maximum Compliance
                    </div>
                    <div class="d-flex align-items-center text-dark fw-semibold fs-7">
                        <i class="bi bi-check-circle-fill text-success fs-5 me-2"></i> Nationwide Cold-Chain Preservation & Logistics
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="card border-0 shadow-lg rounded-4 overflow-hidden p-4 p-md-5 text-white" style="background: linear-gradient(135deg, #1b4d3e 0%, #2c8562 100%);">
                    <div class="bg-white bg-opacity-15 p-3 rounded-circle d-inline-flex mb-4" style="width: 70px; height: 70px; align-items: center; justify-content: center;">
                        <i class="bi bi-shield-check fs-1 text-white"></i>
                    </div>
                    <h3 class="fw-bold mb-3">Quality Assurance Commitment</h3>
                    <p class="text-white-50 fs-6 lh-lg mb-4">
                        Operating under strict Good Manufacturing Practice (GMP) guidelines to guarantee safety, purity, and therapeutic potency for every single product batch released.
                    </p>
                    <div class="pt-3 border-top border-white border-opacity-25 d-flex align-items-center justify-content-between">
                        <span class="fs-7 fw-medium text-white-50">DGDA Standards Certified</span>
                        <span class="badge bg-white text-success fw-bold px-3 py-2">Verified</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Mission & Vision Split Cards -->
<section class="py-5 bg-white">
    <div class="container py-3">
        <div class="row g-4">
            <div class="col-12 col-md-6">
                <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 h-100 border-top border-4 border-success" style="background: #ffffff;">
                    <div class="bg-success-subtle text-success p-3 rounded-3 d-inline-flex mb-3" style="width: 55px; height: 55px; align-items: center; justify-content: center;">
                        <i class="bi bi-bullseye fs-3"></i>
                    </div>
                    <h3 class="fw-bold text-dark brand-font mb-3">Our Mission</h3>
                    <p class="text-secondary lh-lg mb-0">
                        To manufacture and market high-quality, bioequivalent pharmaceutical products that improve patient well-being, support medical practitioners with evidence-based formulations, and make clinical healthcare accessible across all regions of Bangladesh.
                    </p>
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 h-100 border-top border-4 border-primary" style="background: #ffffff;">
                    <div class="bg-primary-subtle text-primary p-3 rounded-3 d-inline-flex mb-3" style="width: 55px; height: 55px; align-items: center; justify-content: center;">
                        <i class="bi bi-eye fs-3"></i>
                    </div>
                    <h3 class="fw-bold text-dark brand-font mb-3">Our Vision</h3>
                    <p class="text-secondary lh-lg mb-0">
                        To become Bangladesh’s most trusted pharmaceutical partner in specialized dermatology, gastroenterology, pediatrics, and preventive healthcare by continuously innovating product lines and adhering to global pharmaceutical standards.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 4 Core Operating Pillars -->
<section class="py-5" style="background-color: #f8fafc;">
    <div class="container py-3">
        <div class="text-center max-w-2xl mx-auto mb-5">
            <span class="text-success fw-bold text-uppercase fs-8">Guided By Principle</span>
            <h2 class="fw-extrabold text-dark brand-font display-6">Our Core Operating Pillars</h2>
        </div>

        <div class="row g-4">
            <div class="col-12 col-md-3">
                <div class="card border-0 shadow-sm rounded-4 p-4 text-center h-100 bg-white">
                    <div class="bg-success-subtle text-success p-3 rounded-circle mx-auto mb-3" style="width: 60px; height: 60px; display: flex; align-items: center; justify-content: center;">
                        <i class="bi bi-award fs-3"></i>
                    </div>
                    <h5 class="fw-bold text-dark mb-2">Uncompromised Quality</h5>
                    <p class="text-muted fs-7 mb-0">Rigorous batch stability testing, purity checks, and active ingredient verification.</p>
                </div>
            </div>

            <div class="col-12 col-md-3">
                <div class="card border-0 shadow-sm rounded-4 p-4 text-center h-100 bg-white">
                    <div class="bg-success-subtle text-success p-3 rounded-circle mx-auto mb-3" style="width: 60px; height: 60px; display: flex; align-items: center; justify-content: center;">
                        <i class="bi bi-file-medical fs-3"></i>
                    </div>
                    <h5 class="fw-bold text-dark mb-2">Clinical Integrity</h5>
                    <p class="text-muted fs-7 mb-0">Transparent medical literature, comprehensive pharmacology data, and clear safety disclosures.</p>
                </div>
            </div>

            <div class="col-12 col-md-3">
                <div class="card border-0 shadow-sm rounded-4 p-4 text-center h-100 bg-white">
                    <div class="bg-success-subtle text-success p-3 rounded-circle mx-auto mb-3" style="width: 60px; height: 60px; display: flex; align-items: center; justify-content: center;">
                        <i class="bi bi-heart-pulse fs-3"></i>
                    </div>
                    <h5 class="fw-bold text-dark mb-2">Patient Centricity</h5>
                    <p class="text-muted fs-7 mb-0">Engineering easy-to-use dosage forms and gentle formulations tailored for patient compliance.</p>
                </div>
            </div>

            <div class="col-12 col-md-3">
                <div class="card border-0 shadow-sm rounded-4 p-4 text-center h-100 bg-white">
                    <div class="bg-success-subtle text-success p-3 rounded-circle mx-auto mb-3" style="width: 60px; height: 60px; display: flex; align-items: center; justify-content: center;">
                        <i class="bi bi-truck fs-3"></i>
                    </div>
                    <h5 class="fw-bold text-dark mb-2">Ethical Distribution</h5>
                    <p class="text-muted fs-7 mb-0">Seamless distribution network delivering genuine medicines across urban and rural Bangladesh.</p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

