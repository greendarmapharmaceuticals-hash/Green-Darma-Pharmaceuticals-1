@extends('layouts.app')

@section('title', ($product->seo_title ?: $product->name) . ' | Green Darma Pharmaceuticals')
@section('meta_description', $product->meta_description ?: $product->short_description)
@section('meta_keywords', $product->meta_keywords)
@section('canonical_url', route('products.show', $product->slug))
@section('og_image', ($product->featured_image && file_exists(public_path($product->featured_image))) ? asset($product->featured_image) : asset('favicon.ico'))

@push('schema')
    @php
        $seoService = new \App\Services\SeoService();
        $prodSchema = $seoService->generateProductSchema($product);
        $faqSchema = $seoService->generateFaqSchema($product);
        $breadcrumbSchema = $seoService->generateBreadcrumbSchema([
            ['name' => 'Home', 'url' => url('/')],
            ['name' => 'Products', 'url' => route('products.index')],
            ['name' => $product->name, 'url' => route('products.show', $product->slug)],
        ]);
    @endphp
    <script type="application/ld+json">
        {!! json_encode($prodSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
    </script>
    @if($faqSchema)
        <script type="application/ld+json">
            {!! json_encode($faqSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
        </script>
    @endif
    <script type="application/ld+json">
        {!! json_encode($breadcrumbSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
    </script>
@endpush

@push('styles')
<style>
    .btn-teal {
        background: linear-gradient(135deg, #00a884 0%, #008f70 100%);
        color: #ffffff;
        border: none;
        box-shadow: 0 4px 14px rgba(0, 168, 132, 0.28);
        transition: all 0.25s ease;
    }
    .btn-teal:hover {
        background: linear-gradient(135deg, #008f70 0%, #007a5e 100%);
        color: #ffffff;
        transform: translateY(-2px);
        box-shadow: 0 6px 18px rgba(0, 168, 132, 0.38);
    }
    .medex-section {
        margin-bottom: 1.85rem;
        background: #ffffff;
        border-radius: 8px;
    }
    .medex-header-bar {
        background-color: #cbd5e1;
        color: #0f172a;
        font-weight: 700;
        font-size: 1.18rem;
        padding: 0.75rem 1.25rem;
        border-left: 6px solid #0284c7;
        border-radius: 6px;
        margin-bottom: 1rem;
        font-family: 'Poppins', 'Inter', sans-serif;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.04);
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    .medex-body-text {
        font-size: 1.08rem;
        color: #1e293b;
        line-height: 1.85;
        padding: 0.4rem 0.5rem 0.6rem 0.75rem;
        font-family: 'Inter', system-ui, -apple-system, sans-serif;
    }
    .medex-body-text p {
        margin-bottom: 0.75rem;
    }
    .medex-prescribe-note {
        background-color: #f0f9ff;
        border-left: 4px solid #0284c7;
        color: #0369a1;
        font-size: 0.95rem;
        padding: 0.65rem 1rem;
        border-radius: 0 6px 6px 0;
        margin-top: 1rem;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    .price-box-medex {
        background-color: #f8fafc;
        border: 1.5px solid #cbd5e1;
        border-radius: 10px;
        padding: 1rem 1.4rem;
    }
    .bullet-item {
        margin-bottom: 0.5rem;
        display: flex;
        align-items: flex-start;
        gap: 0.6rem;
    }
    .bullet-icon {
        color: #00a884;
        font-size: 1rem;
        margin-top: 0.2rem;
    }
</style>
@endpush

@section('content')

<!-- BREADCRUMB -->
<div class="bg-white border-bottom py-3">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb fs-7 mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-decoration-none text-muted">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('products.index') }}" class="text-decoration-none text-muted">Products</a></li>
                <li class="breadcrumb-item active text-dark fw-bold" aria-current="page">{{ $product->name }}</li>
            </ol>
        </nav>
    </div>
</div>

<!-- PRODUCT DETAILS CONTAINER -->
<div class="py-4 py-md-5">
    <div class="container">
        <div class="card card-custom p-4 p-md-5 mb-5 bg-white border-0 shadow-sm">
            
            <!-- MEDEX TOP HEADER CARD WITH IMAGE ON LEFT -->
            <div class="row align-items-center g-4 pb-4 border-bottom">
                <!-- PRODUCT IMAGE (LEFT SIDE) -->
                <div class="col-12 col-md-4 col-lg-3 text-center">
                    <div class="p-3 border border-light-subtle rounded-4 shadow-sm d-inline-block w-100" style="background: linear-gradient(135deg, #ffffff 0%, #f1f5f9 100%);">
                        @if($product->featured_image && file_exists(public_path($product->featured_image)))
                            <img src="{{ asset($product->featured_image) }}" alt="{{ $product->image_alt ?: $product->name }}" class="img-fluid" style="max-height: 240px; width: auto; object-fit: contain; filter: drop-shadow(0 10px 18px rgba(0,0,0,0.12));">
                        @else
                            <div class="py-5 text-muted">
                                <i class="bi bi-box-seam display-4 d-block mb-2"></i>
                                <span>No Image Available</span>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- PRODUCT DETAILS (RIGHT SIDE) -->
                <div class="col-12 col-md-8 col-lg-9">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start gap-3 mb-2">
                        <div class="d-flex flex-wrap align-items-center gap-2">
                            <span class="badge bg-teal text-white rounded px-3 py-1.5 fs-7 fw-semibold shadow-sm">
                                <i class="bi bi-box-seam me-1"></i> {{ $product->dosage_form ?? 'Pharmaceutical Form' }}
                            </span>
                        </div>

                        <!-- BILINGUAL TOGGLE BUTTON ("বাংলায় দেখুন") -->
                        <div>
                            <button id="bilingualToggleBtn" class="btn btn-teal text-white fw-bold px-3 py-2 rounded-3 d-flex align-items-center gap-2 fs-7" onclick="toggleBilingualMode()">
                                <i class="bi bi-translate fs-5"></i>
                                <span id="btnLangText">বাংলায় দেখুন</span>
                            </button>
                        </div>
                    </div>

                    <h1 class="fw-extrabold text-dark brand-font mb-3" style="font-size: 2.5rem; letter-spacing: -0.5px;">
                        <i class="bi bi-prescription2 text-success me-2 fs-1"></i> {!! $product->name_html !!}
                    </h1>

                    <div class="fs-5 mb-3">
                        <span class="text-muted fw-medium">Generic Name:</span>
                        <a href="{{ route('products.index', ['search' => $product->generic_name]) }}" class="text-decoration-none text-dark fw-extrabold ms-1" style="color: #000 !important; font-weight: 800;">
                            {{ $product->generic_name }}
                        </a>
                        @if($product->strength)
                            <span class="text-dark fw-bold ms-1">({{ $product->strength }})</span>
                        @endif
                    </div>

                    <div class="fs-6 text-muted mb-3">
                        <i class="bi bi-building me-1 text-success fs-5"></i> <strong>Manufacturer:</strong> <span class="text-dark fw-medium">{{ $product->manufacturer }}</span>
                        @if($product->dar_number)
                            <span class="ms-3"><i class="bi bi-file-earmark-check me-1 text-success fs-5"></i> <strong>DGDA Reg:</strong> <span class="text-dark fw-medium">{{ $product->dar_number }}</span></span>
                        @endif
                    </div>

                    <!-- Pack Presentation & Information Note -->
                    <div class="d-flex flex-wrap align-items-center gap-4 price-box-medex" style="max-width: 580px;">
                        <div>
                            <small class="text-muted d-block fs-8 text-uppercase fw-bold mb-1">Pack Size / Presentation</small>
                            <span class="fs-5 fw-bold text-dark">
                                {{ $product->pack_size ?: '1 Unit' }}
                            </span>
                        </div>
                        <div class="vr"></div>
                        <div>
                            <small class="text-muted d-block fs-8 text-uppercase fw-bold mb-1">Product Status</small>
                            <span class="fw-bold text-success fs-6"><i class="bi bi-info-circle me-1"></i> Medical Information Reference</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Helper function for rendering formatted lines/bullets -->
            @php
                function formatMedexText($text) {
                    if (empty($text)) return '';
                    $lines = explode("\n", trim($text));
                    $output = '';
                    foreach ($lines as $line) {
                        $line = trim($line);
                        if (empty($line)) continue;
                        if (str_starts_with($line, '•') || str_starts_with($line, '-')) {
                            $cleanLine = trim(ltrim($line, '•- '));
                            $output .= '<div class="bullet-item"><i class="bi bi-caret-right-fill bullet-icon"></i><div>' . e($cleanLine) . '</div></div>';
                        } else {
                            $output .= '<p class="mb-2">' . e($line) . '</p>';
                        }
                    }
                    return $output;
                }
            @endphp

            <!-- MEDEX GREY SECTION HEADERS & CONTENT -->
            <div id="medexContentArea" class="mt-4">

                <!-- 1. INDICATIONS -->
                @if($product->indications)
                    <div class="medex-section">
                        <div class="medex-header-bar">
                            <span class="lang-en"><i class="bi bi-check2-circle me-2"></i> Indications</span>
                            <span class="lang-bn d-none"><i class="bi bi-check2-circle me-2"></i> নির্দেশনা</span>
                        </div>
                        <div class="medex-body-text">
                            <div class="lang-en">{!! formatMedexText($product->indications) !!}</div>
                            <div class="lang-bn d-none">{!! formatMedexText($product->bn_indications) !!}</div>
                            <div class="medex-prescribe-note">
                                <i class="bi bi-asterisk fs-6"></i> রেজিস্টার্ড চিকিৎসকের পরামর্শ মোতাবেক ঔষধ সেবন করুন
                            </div>
                        </div>
                    </div>
                @endif

                <!-- 2. PHARMACOLOGY -->
                @if($product->pharmacology)
                    <div class="medex-section">
                        <div class="medex-header-bar">
                            <span class="lang-en"><i class="bi bi-journal-medical me-2"></i> Pharmacology</span>
                            <span class="lang-bn d-none"><i class="bi bi-journal-medical me-2"></i> ফার্মাকোলজি</span>
                        </div>
                        <div class="medex-body-text">
                            <div class="lang-en">{!! formatMedexText($product->pharmacology) !!}</div>
                            <div class="lang-bn d-none">{!! formatMedexText($product->bn_pharmacology) !!}</div>
                        </div>
                    </div>
                @endif


                <!-- 4. DOSAGE & ADMINISTRATION -->
                @if($product->dosage)
                    <div class="medex-section">
                        <div class="medex-header-bar">
                            <span class="lang-en"><i class="bi bi-clock-history me-2"></i> Dosage & Administration</span>
                            <span class="lang-bn d-none"><i class="bi bi-clock-history me-2"></i> মাত্রাও সেবনবিধি</span>
                        </div>
                        <div class="medex-body-text">
                            <div class="lang-en">{!! formatMedexText($product->dosage) !!}</div>
                            <div class="lang-bn d-none">{!! formatMedexText($product->bn_dosage) !!}</div>
                            <div class="medex-prescribe-note">
                                <i class="bi bi-asterisk fs-6"></i> রেজিস্টার্ড চিকিৎসকের পরামর্শ মোতাবেক ঔষধ সেবন করুন
                            </div>
                        </div>
                    </div>
                @endif

                <!-- 5. DIRECTIONS FOR USE -->
                @if($product->directions_for_use)
                    <div class="medex-section">
                        <div class="medex-header-bar">
                            <span class="lang-en"><i class="bi bi-hand-index-thumb me-2"></i> Directions for Use</span>
                            <span class="lang-bn d-none"><i class="bi bi-hand-index-thumb me-2"></i> ব্যবহারবিধি</span>
                        </div>
                        <div class="medex-body-text">
                            <div>{!! formatMedexText($product->directions_for_use) !!}</div>
                        </div>
                    </div>
                @endif

                <!-- 6. CONTRAINDICATIONS -->
                @if($product->contraindications)
                    <div class="medex-section">
                        <div class="medex-header-bar">
                            <span class="lang-en"><i class="bi bi-x-circle me-2"></i> Contraindications</span>
                            <span class="lang-bn d-none"><i class="bi bi-x-circle me-2"></i> প্রতিনির্দেশনা</span>
                        </div>
                        <div class="medex-body-text">
                            <div>{!! formatMedexText($product->contraindications) !!}</div>
                        </div>
                    </div>
                @endif

                <!-- 7. SIDE EFFECTS -->
                @if($product->side_effects)
                    <div class="medex-section">
                        <div class="medex-header-bar">
                            <span class="lang-en"><i class="bi bi-exclamation-triangle me-2"></i> Side Effects</span>
                            <span class="lang-bn d-none"><i class="bi bi-exclamation-triangle me-2"></i> পার্শ্বপ্রতিক্রিয়া</span>
                        </div>
                        <div class="medex-body-text">
                            <div class="lang-en">{!! formatMedexText($product->side_effects) !!}</div>
                            <div class="lang-bn d-none">{!! formatMedexText($product->bn_side_effects) !!}</div>
                        </div>
                    </div>
                @endif

                <!-- 8. PRECAUTIONS & WARNINGS -->
                @if($product->precautions || $product->warnings)
                    <div class="medex-section">
                        <div class="medex-header-bar">
                            <span class="lang-en"><i class="bi bi-shield-exclamation me-2"></i> Precautions & Warnings</span>
                            <span class="lang-bn d-none"><i class="bi bi-shield-exclamation me-2"></i> সতর্কতা</span>
                        </div>
                        <div class="medex-body-text">
                            <div>{!! formatMedexText($product->precautions ?: $product->warnings) !!}</div>
                        </div>
                    </div>
                @endif

                <!-- 9. PREGNANCY & LACTATION -->
                @if($product->pregnancy_lactation)
                    <div class="medex-section">
                        <div class="medex-header-bar">
                            <span class="lang-en"><i class="bi bi-person-heart me-2"></i> Pregnancy & Lactation</span>
                            <span class="lang-bn d-none"><i class="bi bi-person-heart me-2"></i> গর্ভাবস্থায় ও স্তন্যদানকালে</span>
                        </div>
                        <div class="medex-body-text">
                            <div>{!! formatMedexText($product->pregnancy_lactation) !!}</div>
                        </div>
                    </div>
                @endif


                <!-- 11. STORAGE CONDITIONS -->
                @if($product->storage)
                    <div class="medex-section">
                        <div class="medex-header-bar">
                            <span class="lang-en"><i class="bi bi-box me-2"></i> Storage Conditions</span>
                            <span class="lang-bn d-none"><i class="bi bi-box me-2"></i> সংরক্ষণ পদ্ধতি</span>
                        </div>
                        <div class="medex-body-text">
                            <div class="lang-en">{!! formatMedexText($product->storage) !!}</div>
                            <div class="lang-bn d-none">{!! formatMedexText($product->bn_storage) !!}</div>
                        </div>
                    </div>
                @endif


                <!-- 13. THERAPEUTIC CLASS -->
                <div class="medex-section">
                    <div class="medex-header-bar">
                        <span class="lang-en"><i class="bi bi-tags me-2"></i> Therapeutic Class</span>
                        <span class="lang-bn d-none"><i class="bi bi-tags me-2"></i> থেরাপিউটিক ক্লাস</span>
                    </div>
                    <div class="medex-body-text">
                        <div class="fw-semibold text-dark fs-6">{{ $product->therapeutic_class ?: 'Clinical Pharmaceutical Formulations' }}</div>
                    </div>
                </div>

                <!-- 14. PATIENT FAQS -->
                @if($product->faqs->count() > 0)
                    <div class="medex-section mt-4">
                        <div class="medex-header-bar bg-dark text-white border-0">
                            <i class="bi bi-question-circle me-2 text-warning"></i> Patient Information & FAQs
                        </div>
                        <div class="medex-body-text pt-2">
                            @foreach($product->faqs as $faq)
                                <div class="mb-3 p-3.5 bg-light rounded-3 border">
                                    <div class="fw-bold text-dark fs-6 mb-1.5"><i class="bi bi-patch-question-fill text-success me-2 fs-5"></i> {{ $faq->question }}</div>
                                    <div class="text-secondary fs-6 ps-4">{!! formatMedexText($faq->answer) !!}</div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- 15. REFERENCES -->
                @if($product->references_list)
                    <div class="medex-section mt-4">
                        <div class="medex-header-bar bg-secondary text-white border-0">
                            <i class="bi bi-bookmark-check me-2"></i> References & Monograph Sources
                        </div>
                        <div class="medex-body-text fs-6 text-muted pt-2">
                            {!! formatMedexText($product->references_list) !!}
                        </div>
                    </div>
                @endif
            </div>

            <!-- BOTTOM PACK SHOTS GALLERY (MedEx Style) -->
            <div class="mt-5 pt-4 border-top text-center">
                <h6 class="fw-bold text-muted text-uppercase fs-7 mb-3">Pack Images - {{ $product->name }}</h6>
                <div class="d-flex justify-content-center align-items-center gap-3 flex-wrap">
                    @if($product->featured_image && file_exists(public_path($product->featured_image)))
                        <div class="card p-2.5 border bg-light shadow-sm rounded-3">
                            <img src="{{ asset($product->featured_image) }}" alt="{{ $product->name }} Pack Shot" class="img-fluid rounded" style="max-height: 180px; width: auto; object-fit: contain;">
                        </div>
                    @else
                        <div class="card p-4 border bg-light text-success shadow-sm rounded-3">
                            <i class="bi bi-prescription2 display-3 mb-1"></i>
                            <span class="fs-7 fw-bold">Official Pack Shot</span>
                        </div>
                    @endif

                    @foreach($product->images as $gImg)
                        <div class="card p-2.5 border bg-light shadow-sm rounded-3">
                            <img src="{{ asset($gImg->image) }}" alt="Pack Image" class="img-fluid rounded" style="max-height: 180px; width: auto; object-fit: contain;">
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    let isBengaliMode = false;

    function toggleBilingualMode() {
        isBengaliMode = !isBengaliMode;
        const btnText = document.getElementById('btnLangText');
        const langEnElements = document.querySelectorAll('.lang-en');
        const langBnElements = document.querySelectorAll('.lang-bn');

        if (isBengaliMode) {
            btnText.innerText = 'View in English';
            langEnElements.forEach(el => el.classList.add('d-none'));
            langBnElements.forEach(el => el.classList.remove('d-none'));
        } else {
            btnText.innerText = 'বাংলায় দেখুন';
            langEnElements.forEach(el => el.classList.remove('d-none'));
            langBnElements.forEach(el => el.classList.add('d-none'));
        }
    }
</script>
@endpush
