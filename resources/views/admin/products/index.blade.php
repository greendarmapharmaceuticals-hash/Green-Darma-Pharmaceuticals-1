@extends('admin.layouts.app')

@section('title', 'Products Management')
@section('page-title', 'Product Catalog Management')

@section('content')

<!-- Header & Add Button -->
<div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
    <div>
        <h4 class="fw-bold mb-1">Products Overview</h4>
        <p class="text-muted mb-0">Manage, search, preview, and update pharmaceutical product details.</p>
    </div>
    <a href="{{ route('admin.products.create') }}" class="btn btn-gdp btn-lg-custom">
        <i class="bi bi-plus-circle me-2"></i> Add New Product
    </a>
</div>

<!-- Search & Filter Card -->
<div class="card card-custom p-3 mb-4">
    <form action="{{ route('admin.products.index') }}" method="GET" class="row g-2 align-items-center">
        <div class="col-12 col-md-5">
            <div class="input-group">
                <span class="input-group-text bg-white"><i class="bi bi-search text-muted"></i></span>
                <input type="text" name="search" class="form-control border-start-0" placeholder="Search by Product Name or Generic Name..." value="{{ request('search') }}">
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
            <select name="category_id" class="form-select">
                <option value="">All Categories</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ request('category_id') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-12 col-sm-6 col-md-2">
            <select name="status" class="form-select">
                <option value="">All Statuses</option>
                <option value="published" {{ request('status') == 'published' ? 'selected' : '' }}>Published</option>
                <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                <option value="archived" {{ request('status') == 'archived' ? 'selected' : '' }}>Archived</option>
            </select>
        </div>
        <div class="col-12 col-md-2 d-flex gap-2">
            <button type="submit" class="btn btn-success w-100 fw-bold">Filter</button>
            <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary"><i class="bi bi-arrow-counterclockwise"></i></a>
        </div>
    </form>
</div>

<!-- Products Table Card -->
<div class="card card-custom">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th style="width: 70px;">Image</th>
                        <th>Product Details</th>
                        <th>Category</th>
                        <th>Strength & Pack</th>
                        <th>Status</th>
                        <th class="text-end pe-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                        <tr>
                            <td>
                                @if($product->featured_image && file_exists(public_path($product->featured_image)))
                                    <img src="{{ asset($product->featured_image) }}" alt="{{ $product->name }}" class="rounded border object-fit-cover" style="width: 50px; height: 50px;">
                                @else
                                    <div class="bg-success-subtle text-success rounded d-flex align-items-center justify-content-center fw-bold fs-5" style="width: 50px; height: 50px;">
                                        Rx
                                    </div>
                                @endif
                            </td>
                            <td>
                                <div class="fw-bold text-dark fs-6">{{ $product->name }}</div>
                                <small class="text-muted"><i class="bi bi-virus me-1"></i> {{ $product->generic_name }}</small>
                            </td>
                            <td>
                                <span class="badge bg-light text-dark border">{{ $product->category->name ?? 'Uncategorized' }}</span>
                            </td>
                            <td>
                                <div class="fs-7 font-monospace">{{ $product->strength ?? 'N/A' }}</div>
                                <small class="text-muted">{{ $product->pack_size ?? 'N/A' }}</small>
                            </td>
                            <td>
                                <form action="{{ route('admin.products.toggle-status', $product) }}" method="POST" class="d-inline">
                                    @csrf
                                    <select name="status" onchange="this.form.submit()" class="form-select form-select-sm border-0 fw-semibold {{ $product->status === 'published' ? 'bg-success-subtle text-success' : ($product->status === 'draft' ? 'bg-warning-subtle text-warning' : 'bg-secondary-subtle text-secondary') }}" style="width: 120px;">
                                        <option value="published" {{ $product->status === 'published' ? 'selected' : '' }}>Published</option>
                                        <option value="draft" {{ $product->status === 'draft' ? 'selected' : '' }}>Draft</option>
                                        <option value="archived" {{ $product->status === 'archived' ? 'selected' : '' }}>Archived</option>
                                    </select>
                                </form>
                            </td>
                            <td class="text-end pe-4">
                                <div class="btn-group">
                                    <a href="{{ route('admin.products.preview', $product) }}" class="btn btn-sm btn-outline-info" title="Preview Product"><i class="bi bi-eye"></i></a>
                                    <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-sm btn-outline-primary" title="Edit Product"><i class="bi bi-pencil-square"></i> Edit</a>
                                    <a href="{{ route('admin.products.duplicate', $product) }}" class="btn btn-sm btn-outline-secondary" title="Duplicate SKU"><i class="bi bi-files"></i></a>
                                    <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $product->id }}" title="Delete"><i class="bi bi-trash"></i></button>
                                </div>

                                <!-- Delete Confirmation Modal -->
                                <div class="modal fade text-start" id="deleteModal{{ $product->id }}" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header border-0">
                                                <h5 class="modal-title fw-bold text-danger"><i class="bi bi-exclamation-triangle-fill me-2"></i> Confirm Delete</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to delete product <strong>"{{ $product->name }}"</strong>? This action cannot be undone.
                                            </div>
                                            <div class="modal-footer border-0">
                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                                                <form action="{{ route('admin.products.destroy', $product) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger fw-bold">Delete Product</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">
                                <i class="bi bi-inbox fs-1 d-block mb-2"></i>
                                No products found matching your search.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($products->hasPages())
            <div class="p-3 border-top d-flex justify-content-end">
                {{ $products->links() }}
            </div>
        @endif
    </div>
</div>

@endsection
