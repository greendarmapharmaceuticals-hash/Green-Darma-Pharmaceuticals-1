@extends('layouts.app')

@section('title', ($selectedCategory ? $selectedCategory->name : 'Pharmaceutical Products Catalog') . ' | Green Darma')

@section('content')

<!-- Header Banner -->
<div class="bg-white border-bottom py-4">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb fs-8 mb-2">
                <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-decoration-none text-muted">Home</a></li>
                <li class="breadcrumb-item active text-success fw-semibold" aria-current="page">Products</li>
                @if($selectedCategory)
                    <li class="breadcrumb-item active text-dark fw-bold" aria-current="page">{{ $selectedCategory->name }}</li>
                @endif
            </ol>
        </nav>
        <h2 class="fw-bold text-dark brand-font mb-1">
            {{ $selectedCategory ? $selectedCategory->name : 'All Pharmaceutical Products' }}
        </h2>
        <p class="text-muted mb-0">
            {{ $selectedCategory ? $selectedCategory->description : 'Browse verified pharmaceutical formulations, medicated soaps, lotions, shampoos, and probiotics.' }}
        </p>
    </div>
</div>

<!-- Main Body Grid -->
<div class="py-5">
    <div class="container">
        <div class="row g-4">
            <!-- Sidebar Col: Categories & Filter -->
            <div class="col-12 col-lg-3">
                <div class="card card-custom p-3 sticky-top" style="top: 100px; z-index: 100;">
                    <h6 class="fw-bold mb-3 text-dark text-uppercase fs-8 letter-spacing"><i class="bi bi-filter me-1 text-success"></i> Categories Filter</h6>
                    
                    <div class="list-group list-group-flush fs-7">
                        <a href="{{ route('products.index') }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center {{ !$selectedCategory ? 'fw-bold text-success bg-success-subtle rounded' : 'text-secondary' }}">
                            <span>All Categories</span>
                            <span class="badge bg-light text-dark border">{{ \App\Models\Product::where('status', 'published')->count() }}</span>
                        </a>

                        @foreach($categories as $cat)
                            <a href="{{ route('products.index', ['category' => $cat->slug]) }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center {{ ($selectedCategory && $selectedCategory->id == $cat->id) ? 'fw-bold text-success bg-success-subtle rounded' : 'text-secondary' }}">
                                <span class="text-truncate">{{ $cat->name }}</span>
                                <span class="badge bg-light text-dark border">{{ $cat->products_count }}</span>
                            </a>
                        @endforeach
                    </div>

                    @if(request('search') || $selectedCategory)
                        <div class="mt-4 pt-3 border-top">
                            <a href="{{ route('products.index') }}" class="btn btn-sm btn-outline-danger w-100">
                                <i class="bi bi-x-circle me-1"></i> Clear All Filters
                            </a>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Products Listing Col -->
            <div class="col-12 col-lg-9">
                <!-- Sorting & Count Bar -->
                <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-2">
                    <div class="text-muted fs-7">
                        Showing <strong class="text-dark">{{ $products->total() }}</strong> published preparations
                        @if(request('search'))
                            matching "<strong class="text-dark">{{ request('search') }}</strong>"
                        @endif
                    </div>

                    <form action="{{ route('products.index') }}" method="GET" class="d-flex align-items-center gap-2">
                        @if(request('category'))<input type="hidden" name="category" value="{{ request('category') }}">@endif
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
                        <div class="col-12 col-sm-6 col-md-4">
                            <x-product-card :product="$product" />
                        </div>
                    @empty
                        <div class="col-12 text-center py-5">
                            <div class="card card-custom p-5 bg-white">
                                <i class="bi bi-search fs-1 text-muted d-block mb-3"></i>
                                <h4 class="fw-bold text-dark mb-2">No Products Found</h4>
                                <p class="text-muted mb-4">We couldn't find any pharmaceutical products matching your filter criteria.</p>
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
                @if($products->hasPages())
                    <div class="mt-5 d-flex justify-content-center">
                        {{ $products->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
