@props(['product'])

<div class="card-product">
    <div class="card-product-img-wrapper">
        @if($product->featured_image && file_exists(public_path($product->featured_image)))
            <img src="{{ asset($product->featured_image) }}" alt="{{ $product->image_alt ?? $product->name }}" class="card-product-img" style="object-fit: contain; filter: drop-shadow(0 6px 12px rgba(0,0,0,0.1));" loading="lazy">
        @else
            <div class="bg-success-subtle text-success py-4 px-3 rounded-circle text-center fw-bold fs-2">
                <i class="bi bi-prescription2"></i>
            </div>
        @endif

        @if($product->is_featured)
            <span class="badge bg-success position-absolute top-0 start-0 m-3 fs-8">Featured SKU</span>
        @endif
    </div>

    <div class="p-3 d-flex flex-column flex-grow-1">
        <h5 class="fw-bold text-dark fs-6 mb-1" title="{{ $product->name }}">
            <a href="{{ route('products.show', $product->slug) }}" class="text-dark text-decoration-none">{!! $product->name_html !!}</a>
        </h5>

        <div class="text-dark fw-bold fs-7 mb-2 text-truncate" style="color: #000 !important;">
            <i class="bi bi-virus me-1 text-success"></i> {{ $product->generic_name }}
        </div>

        <div class="d-flex flex-wrap gap-1 mb-3">
            @if($product->strength)
                <span class="badge bg-light text-dark border fs-8">{{ $product->strength }}</span>
            @endif
            @if($product->dosage_form)
                <span class="badge bg-light text-dark border fs-8">{{ $product->dosage_form }}</span>
            @endif
        </div>

        <div class="mt-auto pt-2 border-top d-flex justify-content-between align-items-center">
            <div>
                <small class="text-muted fs-8 d-block">Pack Presentation</small>
                <span class="fw-bold text-success fs-7">
                    {{ $product->pack_size ?: ($product->dosage_form ?: 'Prescription SKU') }}
                </span>
            </div>
            <a href="{{ route('products.show', $product->slug) }}" class="btn btn-sm btn-outline-success rounded-pill fw-semibold" aria-label="View details for {{ $product->name }}">
                Details <i class="bi bi-arrow-right" aria-hidden="true"></i>
            </a>
        </div>
    </div>
</div>
