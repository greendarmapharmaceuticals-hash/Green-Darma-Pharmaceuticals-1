@extends('admin.layouts.app')

@section('title', 'Categories Management')
@section('page-title', 'Therapeutic Category Management')

@section('content')

<div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
    <div>
        <h4 class="fw-bold mb-1">Product Categories</h4>
        <p class="text-muted mb-0">Organize products into therapeutic classes.</p>
    </div>
    <button type="button" class="btn btn-gdp btn-lg-custom" data-bs-toggle="modal" data-bs-target="#createCategoryModal">
        <i class="bi bi-plus-circle me-2"></i> Add New Category
    </button>
</div>

<!-- Search Bar -->
<div class="card card-custom p-3 mb-4">
    <form action="{{ route('admin.categories.index') }}" method="GET" class="row g-2 align-items-center">
        <div class="col-12 col-md-10">
            <div class="input-group">
                <span class="input-group-text bg-white"><i class="bi bi-search text-muted"></i></span>
                <input type="text" name="search" class="form-control border-start-0" placeholder="Search category by name..." value="{{ request('search') }}">
            </div>
        </div>
        <div class="col-12 col-md-2">
            <button type="submit" class="btn btn-success w-100 fw-bold">Search</button>
        </div>
    </form>
</div>

<!-- Categories Table -->
<div class="card card-custom">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Category Name</th>
                        <th>Slug</th>
                        <th>Associated Products</th>
                        <th>Status</th>
                        <th class="text-end pe-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $category)
                        <tr>
                            <td>
                                <div class="fw-bold text-dark fs-6">{{ $category->name }}</div>
                                <small class="text-muted">{{ Str::limit($category->description, 60) }}</small>
                            </td>
                            <td><code class="text-success">{{ $category->slug }}</code></td>
                            <td>
                                <span class="badge bg-success-subtle text-success fs-7">{{ $category->products_count }} Products</span>
                            </td>
                            <td>
                                @if($category->status === 'active')
                                    <span class="badge bg-success-subtle text-success badge-status">Active</span>
                                @else
                                    <span class="badge bg-secondary-subtle text-secondary badge-status">Inactive</span>
                                @endif
                            </td>
                            <td class="text-end pe-4">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editCategoryModal{{ $category->id }}"><i class="bi bi-pencil me-1"></i> Edit</button>
                                    <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteCategoryModal{{ $category->id }}"><i class="bi bi-trash"></i></button>
                                </div>

                                <!-- Edit Modal -->
                                <div class="modal fade text-start" id="editCategoryModal{{ $category->id }}" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <form action="{{ route('admin.categories.update', $category) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-header border-0">
                                                    <h5 class="modal-title fw-bold">Edit Category: {{ $category->name }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label class="form-label fw-bold">Category Name</label>
                                                        <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label fw-medium">Description</label>
                                                        <textarea name="description" class="form-control" rows="3">{{ $category->description }}</textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label fw-medium">Status</label>
                                                        <select name="status" class="form-select">
                                                            <option value="active" {{ $category->status === 'active' ? 'selected' : '' }}>Active</option>
                                                            <option value="inactive" {{ $category->status === 'inactive' ? 'selected' : '' }}>Inactive</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer border-0">
                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-gdp">Save Changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- Delete Modal -->
                                <div class="modal fade text-start" id="deleteCategoryModal{{ $category->id }}" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header border-0">
                                                <h5 class="modal-title fw-bold text-danger">Delete Category</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to delete category <strong>"{{ $category->name }}"</strong>? Products linked to this category will become uncategorized.
                                            </div>
                                            <div class="modal-footer border-0">
                                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                                                <form action="{{ route('admin.categories.destroy', $category) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete Category</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4 text-muted">No categories created yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($categories->hasPages())
            <div class="p-3 border-top d-flex justify-content-end">
                {{ $categories->links() }}
            </div>
        @endif
    </div>
</div>

<!-- Create Category Modal -->
<div class="modal fade" id="createCategoryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header border-0">
                    <h5 class="modal-title fw-bold text-success"><i class="bi bi-plus-circle me-1"></i> Add New Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Category Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control form-control-lg" placeholder="e.g. Dermatology & Skin Care" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-medium">Description</label>
                        <textarea name="description" class="form-control" rows="3" placeholder="Brief therapeutic category description..."></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-medium">Status</label>
                        <select name="status" class="form-select">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-gdp">Create Category</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
