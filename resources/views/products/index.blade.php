@extends('layouts.app')

@section('title', 'Pharmaceutical Products Catalog | Green Darma')

@section('content')

<!-- E-Catalog Hero Banner -->
<section class="position-relative text-white py-5 overflow-hidden" style="background: linear-gradient(135deg, #1b4d3e 0%, #2c8562 100%);">
    <div class="container position-relative z-1 py-3 text-center max-w-4xl mx-auto">
        <span class="badge bg-white text-success fw-bold px-3 py-2 rounded-pill fs-7 mb-3 shadow-sm">
            <i class="bi bi-boxes me-1"></i> Official Product Catalog
        </span>
        <h1 class="display-5 fw-extrabold text-white brand-font mb-3">
            Explore Clinical Formulations & Preparations
        </h1>
        <p class="lead text-white-50 mb-4 fs-6">
            Browse DGDA-certified dermatological care, anti-scabies preparations, medicated soaps, lotions, shampoos, and nutritional supplements.
        </p>

        <!-- Live Search Box in Hero -->
        <form action="{{ route('products.index') }}" method="GET" class="max-w-2xl mx-auto position-relative">
            <div class="input-group input-group-lg shadow-lg rounded-pill overflow-hidden bg-white p-1">
                <span class="input-group-text bg-transparent border-0 text-muted ps-3">
                    <i class="bi bi-search fs-5 text-success"></i>
                </span>
                <input type="text" name="search" value="{{ request('search') }}" class="form-control border-0 shadow-none fs-6" placeholder="Search by product name, generic name (e.g. Permethrin, Ketoconazole)...">
                <button type="submit" class="btn btn-gdp-primary rounded-pill px-4 me-1">Search Catalog</button>
            </div>
        </form>
    </div>
</section>

<!-- Main Body Catalog Grid -->
<section class="py-5" style="background-color: #f8fafc;">
    <div class="container">
        <!-- Sorting & Active Filter Bar -->
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3 bg-white p-3 rounded-4 shadow-sm border">
            <div class="text-muted fs-7 d-flex align-items-center gap-2">
                <span>Showing <strong class="text-dark">{{ $products->total() }}</strong> preparations</span>
                @if(request('search'))
                    <span class="badge bg-secondary-subtle text-secondary px-2 py-1 rounded-pill">
                        Search: "{{ request('search') }}" <a href="{{ route('products.index') }}" class="text-secondary ms-1"><i class="bi bi-x-circle-fill"></i></a>
                    </span>
                @endif
            </div>

            <form action="{{ route('products.index') }}" method="GET" class="d-flex align-items-center gap-2">
                @if(request('search'))<input type="hidden" name="search" value="{{ request('search') }}">@endif
                <small class="text-muted text-nowrap fs-7 fw-medium"><i class="bi bi-sort-down me-1"></i> Sort By:</small>
                <select name="sort" onchange="this.form.submit()" class="form-select form-select-sm border-secondary-subtle fs-7 rounded-3" style="width: 160px;">
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
                    <div class="card border-0 shadow-sm rounded-4 p-5 bg-white max-w-lg mx-auto">
                        <i class="bi bi-search display-3 text-muted d-block mb-3"></i>
                        <h4 class="fw-bold text-dark mb-2">No Products Found</h4>
                        <p class="text-muted fs-7 mb-4">We couldn't find any pharmaceutical products matching your search criteria.</p>
                        <div>
                            <a href="{{ route('products.index') }}" class="btn btn-gdp-primary rounded-pill px-4">
                                View Full Catalog
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
</section>

@endsection

