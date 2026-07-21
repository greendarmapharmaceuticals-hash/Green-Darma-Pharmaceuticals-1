@extends('layouts.app')

@section('title', ($product->seo_title ?: $product->name) . ' | Green Darma Pharmaceuticals')
@section('meta_description', $product->meta_description ?: $product->short_description)
@section('meta_keywords', $product->meta_keywords)
@section('canonical_url', route('products.show', $product->slug))
@section('og_image', ($product->featured_image && file_exists(public_path($product->featured_image))) ? asset($product->featured_image) : asset('favicon.ico'))

@section('content')

<!-- BREADCRUMB & HEADER -->
<div class="bg-white border-bottom py-3">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb fs-8 mb-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-decoration-none text-muted">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('products.index') }}" class="text-decoration-none text-muted">Products</a></li>
                @if($product->category)
                    <li class="breadcrumb-item"><a href="{{ route('products.index', ['category' => $product->category->slug]) }}" class="text-decoration-none text-muted">{{ $product->category->name }}</a></li>
                @endif
                <li class="breadcrumb-item active text-dark fw-bold" aria-current="page">{{ $product->name }}</li>
            </ol>
        </nav>
    </div>
</div>

<!-- PRODUCT DETAILS BODY -->
<div class="py-5">
    <div class="container">
        <div class="card card-custom p-4 p-md-5 mb-5">
            <div class="row g-5">
                <!-- Gallery Col -->
                <div class="col-12 col-md-5">
                    <div class="card p-3 border-0 bg-light text-center rounded-4 mb-3">
                        @if($product->featured_image && file_exists(public_path($product->featured_image)))
                            <img id="mainProductImg" src="{{ asset($product->featured_image) }}" alt="{{ $product->image_alt ?? $product->name }}" class="img-fluid object-fit-contain" style="max-height: 360px;">
                        @else
                            <div class="py-5 text-success">
                                <i class="bi bi-prescription2 display-1 d-block mb-2"></i>
                                <span class="fw-bold fs-5">Rx Official Pack Shot</span>
                            </div>
                        @endif
                    </div>

                    @if($product->images->count() > 0)
                        <div class="d-flex gap-2 justify-content-center flex-wrap">
                            @if($product->featured_image)
                                <img src="{{ asset($product->featured_image) }}" class="img-thumbnail cursor-pointer gallery-thumb border-success" style="width: 65px; height: 65px; object-fit: cover;" onclick="changeMainImage(this.src)">
                            @endif
                            @foreach($product->images as $gImg)
                                <img src="{{ asset($gImg->image) }}" class="img-thumbnail cursor-pointer gallery-thumb" style="width: 65px; height: 65px; object-fit: cover;" onclick="changeMainImage(this.src)">
                            @endforeach
                        </div>
                    @endif
                </div>

                <!-- Specs Col -->
                <div class="col-12 col-md-7">
                    <span class="badge bg-success-subtle text-success fw-bold px-3 py-2 rounded-pill fs-7 mb-2">
                        {{ $product->category->name ?? 'Therapeutic Line' }}
                    </span>

                    <h1 class="fw-bold text-dark brand-font display-6 mb-2">{{ $product->name }}</h1>

                    <div class="fs-5 text-secondary mb-3">
                        <i class="bi bi-virus me-1 text-success"></i> Generic Name: <strong class="text-dark">{{ $product->generic_name }}</strong>
                    </div>

                    <div class="d-flex flex-wrap gap-2 mb-4">
                        @if($product->strength)
                            <span class="badge bg-light text-dark border fs-7 p-2"><i class="bi bi-bounding-box me-1 text-success"></i> Strength: {{ $product->strength }}</span>
                        @endif
                        @if($product->dosage_form)
                            <span class="badge bg-light text-dark border fs-7 p-2"><i class="bi bi-capsule me-1 text-success"></i> Form: {{ $product->dosage_form }}</span>
                        @endif
                        @if($product->pack_size)
                            <span class="badge bg-light text-dark border fs-7 p-2"><i class="bi bi-box-seam me-1 text-success"></i> Pack: {{ $product->pack_size }}</span>
                        @endif
                    </div>

                    <!-- Pricing Box -->
                    <div class="card p-3 bg-light border-0 rounded-3 mb-4">
                        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
                            <div>
                                <small class="text-muted d-block fs-8 uppercase fw-bold">Official Maximum Retail Price (MRP)</small>
                                <span class="fs-3 fw-bold text-success">
                                    @if($product->price)
                                        BDT {{ number_format($product->price, 2) }}
                                    @else
                                        Pending Final Approval
                                    @endif
                                </span>
                            </div>

                            @if($product->market_price_range)
                                <div class="text-md-end">
                                    <small class="text-muted d-block fs-8 uppercase fw-bold">Generic BD Market Ref</small>
                                    <span class="fw-semibold text-dark fs-7">{{ $product->market_price_range }}</span>
                                </div>
                            @endif
                        </div>
                    </div>

                    @if($product->short_description)
                        <p class="text-secondary fs-6 mb-4 lead" style="font-size: 1rem !important;">{{ $product->short_description }}</p>
                    @endif

                    <div class="border-top pt-3 text-muted fs-7">
                        <div class="mb-1"><i class="bi bi-building me-2 text-success"></i> <strong>Manufacturer:</strong> {{ $product->manufacturer }}</div>
                        @if($product->dar_number)
                            <div><i class="bi bi-file-earmark-check me-2 text-success"></i> <strong>DGDA Registration (DAR):</strong> {{ $product->dar_number }}</div>
                        @endif
                    </div>
                </div>

                <!-- CLINICAL INFORMATION ACCORDIONS -->
                <div class="col-12 mt-5">
                    <h4 class="fw-bold text-dark brand-font mb-3 border-bottom pb-2">Pharmacological & Clinical Reference</h4>
                    
                    <div class="accordion accordion-custom" id="clinicalAccordion">
                        @if($product->pharmacology)
                            <div class="accordion-item border rounded-3 mb-2">
                                <h2 class="accordion-header">
                                    <button class="accordion-button fw-bold text-success fs-6" type="button" data-bs-toggle="collapse" data-bs-target="#accPharmacology">
                                        <i class="bi bi-journal-medical me-2"></i> Pharmacology & Mechanism of Action
                                    </button>
                                </h2>
                                <div id="accPharmacology" class="accordion-collapse collapse show" data-bs-parent="#clinicalAccordion">
                                    <div class="accordion-body text-secondary lh-lg">{{ $product->pharmacology }}</div>
                                </div>
                            </div>
                        @endif

                        @if($product->indications)
                            <div class="accordion-item border rounded-3 mb-2">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed fw-bold text-success fs-6" type="button" data-bs-toggle="collapse" data-bs-target="#accIndications">
                                        <i class="bi bi-check2-circle me-2"></i> Indications & Uses
                                    </button>
                                </h2>
                                <div id="accIndications" class="accordion-collapse collapse" data-bs-parent="#clinicalAccordion">
                                    <div class="accordion-body text-secondary lh-lg">{{ $product->indications }}</div>
                                </div>
                            </div>
                        @endif

                        @if($product->dosage)
                            <div class="accordion-item border rounded-3 mb-2">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed fw-bold text-success fs-6" type="button" data-bs-toggle="collapse" data-bs-target="#accDosage">
                                        <i class="bi bi-clock-history me-2"></i> Dosage & Administration
                                    </button>
                                </h2>
                                <div id="accDosage" class="accordion-collapse collapse" data-bs-parent="#clinicalAccordion">
                                    <div class="accordion-body text-secondary lh-lg">{{ $product->dosage }}</div>
                                </div>
                            </div>
                        @endif

                        @if($product->side_effects)
                            <div class="accordion-item border rounded-3 mb-2">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed fw-bold text-success fs-6" type="button" data-bs-toggle="collapse" data-bs-target="#accSideEffects">
                                        <i class="bi bi-exclamation-triangle me-2"></i> Side Effects & Precautions
                                    </button>
                                </h2>
                                <div id="accSideEffects" class="accordion-collapse collapse" data-bs-parent="#clinicalAccordion">
                                    <div class="accordion-body text-secondary lh-lg">
                                        <p><strong>Side Effects:</strong> {{ $product->side_effects }}</p>
                                        @if($product->precautions)
                                            <p class="mb-0"><strong>Precautions:</strong> {{ $product->precautions }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if($product->storage)
                            <div class="accordion-item border rounded-3 mb-2">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed fw-bold text-success fs-6" type="button" data-bs-toggle="collapse" data-bs-target="#accStorage">
                                        <i class="bi bi-box me-2"></i> Storage Conditions
                                    </button>
                                </h2>
                                <div id="accStorage" class="accordion-collapse collapse" data-bs-parent="#clinicalAccordion">
                                    <div class="accordion-body text-secondary">{{ $product->storage }}</div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- FAQS ACCORDION -->
                @if($product->faqs->count() > 0)
                    <div class="col-12 mt-4">
                        <h4 class="fw-bold text-dark brand-font mb-3 border-bottom pb-2">Frequently Asked Questions (FAQs)</h4>
                        <div class="accordion" id="faqAccordion">
                            @foreach($product->faqs as $index => $faq)
                                <div class="accordion-item border rounded-3 mb-2">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button {{ $index === 0 ? '' : 'collapsed' }} fw-semibold text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#faqCol{{ $index }}">
                                            <i class="bi bi-question-circle text-success me-2"></i> {{ $faq->question }}
                                        </button>
                                    </h2>
                                    <div id="faqCol{{ $index }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}" data-bs-parent="#faqAccordion">
                                        <div class="accordion-body text-secondary">{{ $faq->answer }}</div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <!-- RELATED PRODUCTS RECOMMENDATIONS -->
        @if($relatedProducts->count() > 0)
            <div class="mb-4">
                <h4 class="fw-bold text-dark brand-font mb-4">Related Therapeutic Products</h4>
                <div class="row g-4">
                    @foreach($relatedProducts as $rel)
                        <div class="col-12 col-sm-6 col-md-3">
                            <x-product-card :product="$rel" />
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</div>

@endsection

@push('scripts')
<script>
    function changeMainImage(src) {
        const mainImg = document.getElementById('mainProductImg');
        if (mainImg) {
            mainImg.src = src;
        }
    }
</script>
@endpush
