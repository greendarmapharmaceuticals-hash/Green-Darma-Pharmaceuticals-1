@extends('layouts.app')

@section('title', 'Pharmaceutical Products Catalog | Green Darma')

@section('content')

<!-- Header Banner -->
<div class="bg-white border-bottom py-4">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb fs-8 mb-2">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-decoration-none text-muted">Home</a></li>
                <li class="breadcrumb-item active text-success fw-semibold" aria-current="page">Products</li>
            </ol>
        </nav>
        <h2 class="fw-bold text-dark brand-font mb-1">
            All Pharmaceutical Products
        </h2>
        <p class="text-muted mb-0">
            Browse verified clinical pharmaceutical formulations, medicated soaps, topical preparations, lotions, and healthcare products.
        </p>
    </div>
</div>

<!-- Main Body Grid -->
<div class="py-5">
    <div class="container">
        <!-- Sorting & Count Bar -->
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-2">
            <div class="text-muted fs-7">
                Showing <strong class="text-dark">{{ $products->total() }}</strong> published preparations
                @if(request('search'))
                    matching "<strong class="text-dark">{{ request('search') }}</strong>"
                @endif
            </div>

            <form action="{{ route('products.index') }}" method="GET" class="d-flex align-items-center gap-2">
                @if(request('search'))<input type="hidden" name="search" value="{{ request('search') }}">@endif
                <small class="text-muted text-nowrap fs-7">Sort By:</small>
                <select name="sort" onchange="this.form.submit()" class="form-select form-select-sm border-secondary-subtle fs-7" style="width: 150px;">
                    <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Latest Added</option>
                    <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Name (A to Z)</option>
                    <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Name (Z to A)</option>
                    <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Oldest First</option>
                </select>
            </form>
        </div>

        <!-- Products Grid -->
        <div class="row g-4">
            @forelse($products as $product)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <x-product-card :product="$product" />
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <div class="card card-custom p-5 bg-white">
                        <i class="bi bi-search fs-1 text-muted d-block mb-3"></i>
                        <h4 class="fw-bold text-dark mb-2">No Products Found</h4>
                        <p class="text-muted mb-4">We couldn't find any pharmaceutical products matching your search query.</p>
                        <div>
                            <a href="{{ route('products.index') }}" class="btn btn-gdp-primary">
                                View All Products
                            </a>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Pagination Links -->
        <div class="mt-5 d-flex justify-content-center">
            {{ $products->links() }}
        </div>
    </div>
</div>

@endsection
