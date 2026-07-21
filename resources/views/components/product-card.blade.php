@props(['product'])

<div class="card-product">
    <div class="card-product-img-wrapper">
        @if($product->featured_image && file_exists(public_path($product->featured_image)))
            <img src="{{ asset($product->featured_image) }}" alt="{{ $product->image_alt ?? $product->name }}" class="card-product-img">
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
        <div class="text-uppercase text-success fw-bold fs-8 mb-1">
            {{ $product->category->name ?? 'Therapeutic Line' }}
        </div>

        <h5 class="fw-bold text-dark fs-6 mb-1 text-truncate" title="{{ $product->name }}">
            <a href="{{ route('products.show', $product->slug) }}" class="text-dark text-decoration-none">{{ $product->name }}</a>
        </h5>

        <div class="text-muted fs-7 mb-2 text-truncate">
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
                <small class="text-muted fs-8 d-block">Reference Price</small>
                <span class="fw-bold text-success fs-6">
                    @if($product->price)
                        BDT {{ number_format($product->price, 2) }}
                    @else
                        {{ $product->market_price_range ? Str::limit($product->market_price_range, 16) : 'MRP Ref' }}
                    @endif
                </span>
            </div>
            <a href="{{ route('products.show', $product->slug) }}" class="btn btn-sm btn-outline-success rounded-pill fw-semibold">
                Details <i class="bi bi-arrow-right"></i>
            </a>
        </div>
    </div>
</div>
