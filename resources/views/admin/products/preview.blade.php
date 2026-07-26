@extends('admin.layouts.app')

@section('title', 'Preview: ' . $product->name)
@section('page-title', 'Live Product Preview: ' . $product->name)

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div class="d-flex align-items-center gap-2">
        <span class="badge {{ $product->status === 'published' ? 'bg-success' : 'bg-warning' }} fs-6 px-3 py-2">
            Status: {{ ucfirst($product->status) }}
        </span>
        <span class="text-muted">Draft changes can be reviewed here before publishing to the live website.</span>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-primary">
            <i class="bi bi-pencil-square me-1"></i> Edit Product
        </a>
        <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> Back to List
        </a>
    </div>
</div>

<!-- Preview Container Simulation -->
<div class="card card-custom p-4 bg-white border">
    <div class="row g-4">
        <!-- Image Gallery Col -->
        <div class="col-12 col-md-5">
            <div class="border rounded p-3 text-center bg-light">
                @if($product->featured_image && file_exists(public_path($product->featured_image)))
                    <img src="{{ asset($product->featured_image) }}" alt="{{ $product->name }}" class="img-fluid rounded" style="max-height: 350px;">
                @else
                    <div class="bg-success-subtle text-success py-5 rounded fw-bold fs-2">
                        <i class="bi bi-prescription2 display-1 d-block mb-2"></i>
                        Rx Pack Shot
                    </div>
                @endif
            </div>

            @if($product->images->count() > 0)
                <div class="d-flex gap-2 mt-3 flex-wrap justify-content-center">
                    @foreach($product->images as $gImg)
                        <img src="{{ asset($gImg->image) }}" class="img-thumbnail" style="width: 70px; height: 70px; object-fit: cover;">
                    @endforeach
                </div>
            @endif
        </div>

        <!-- Product Specs Col -->
        <div class="col-12 col-md-7">
            <div class="badge bg-success-subtle text-success fw-bold px-3 py-2 mb-2">
                {{ $product->category->name ?? 'Therapeutic Care' }}
            </div>
            <h2 class="fw-bold text-dark mb-1">{!! $product->name_html !!}</h2>
            <div class="text-muted fs-5 mb-3"><i class="bi bi-shield-plus me-1 text-success"></i> Generic: <strong>{{ $product->generic_name }}</strong></div>

            <div class="d-flex flex-wrap gap-2 mb-3">
                <span class="badge bg-light text-dark border fs-7 p-2"><i class="bi bi-bounding-box me-1"></i> Strength: {{ $product->strength ?? 'N/A' }}</span>
                <span class="badge bg-light text-dark border fs-7 p-2"><i class="bi bi-capsule me-1"></i> Form: {{ $product->dosage_form ?? 'N/A' }}</span>
                <span class="badge bg-light text-dark border fs-7 p-2"><i class="bi bi-box-seam me-1"></i> Pack: {{ $product->pack_size ?? 'N/A' }}</span>
            </div>

            <div class="card p-3 bg-light border-0 mb-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <small class="text-muted d-block">Official Maximum Retail Price (MRP)</small>
                        <span class="fs-3 fw-bold text-success">
                            @if($product->price)
                                BDT {{ number_format($product->price, 2) }}
                            @else
                                Price Pending Approval
                            @endif
                        </span>
                    </div>
                    @if($product->market_price_range)
                        <div class="text-end">
                            <small class="text-muted d-block">Generic BD Market Ref</small>
                            <span class="fw-semibold text-dark fs-7">{{ $product->market_price_range }}</span>
                        </div>
                    @endif
                </div>
            </div>

            <p class="text-secondary fs-6">{{ $product->short_description }}</p>

            <div class="border-top pt-3 text-muted fs-7">
                <div><strong>Manufacturer:</strong> {{ $product->manufacturer }}</div>
                @if($product->dar_number)
                    <div><strong>DGDA Registration:</strong> {{ $product->dar_number }}</div>
                @endif
            </div>
        </div>

        <!-- Clinical Details Accordion -->
        <div class="col-12 mt-4">
            <h5 class="fw-bold mb-3 border-bottom pb-2">Pharmacological & Clinical Information</h5>
            <div class="accordion" id="clinicalAccordion">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#accPharm">Pharmacology & Mechanism</button>
                    </h2>
                    <div id="accPharm" class="accordion-collapse collapse show">
                        <div class="accordion-body">{{ $product->pharmacology ?? 'No pharmacology information added.' }}</div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#accInd">Indications</button>
                    </h2>
                    <div id="accInd" class="accordion-collapse collapse">
                        <div class="accordion-body">{{ $product->indications ?? 'No indications specified.' }}</div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#accDosage">Dosage & Administration</button>
                    </h2>
                    <div id="accDosage" class="accordion-collapse collapse">
                        <div class="accordion-body">{{ $product->dosage ?? 'Consult a physician.' }}</div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#accSide">Side Effects & Warnings</button>
                    </h2>
                    <div id="accSide" class="accordion-collapse collapse">
                        <div class="accordion-body">{{ $product->side_effects ?? 'No severe side effects reported.' }}</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- FAQs Section -->
        @if($product->faqs->count() > 0)
            <div class="col-12 mt-4">
                <h5 class="fw-bold mb-3 border-bottom pb-2">Product FAQs ({{ $product->faqs->count() }})</h5>
                <div class="row g-3">
                    @foreach($product->faqs as $faq)
                        <div class="col-12 col-md-6">
                            <div class="card p-3 bg-light border-0 h-100">
                                <div class="fw-bold text-dark mb-1"><i class="bi bi-question-circle text-success me-2"></i> {{ $faq->question }}</div>
                                <div class="text-secondary fs-7">{{ $faq->answer }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</div>

@endsection
