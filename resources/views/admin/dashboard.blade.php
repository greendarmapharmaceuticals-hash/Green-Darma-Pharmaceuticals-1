@extends('admin.layouts.app')

@section('title', 'Admin Dashboard')
@section('page-title', 'System Overview & Dashboard')

@section('content')

<!-- Metric Cards -->
<div class="row g-3 mb-4">
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card card-custom p-3 border-start border-success border-4 h-100">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="text-uppercase fs-8 fw-bold text-muted mb-1">Total Products</div>
                    <div class="fs-2 fw-bold text-dark lh-1">{{ $totalProducts }}</div>
                    <small class="text-success fs-8 fw-medium"><i class="bi bi-check-circle me-1"></i> {{ $publishedProducts }} Published, {{ $draftProducts }} Draft</small>
                </div>
                <div class="bg-success-subtle text-success p-3 rounded-circle">
                    <i class="bi bi-prescription2 fs-2"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card card-custom p-3 border-start border-primary border-4 h-100">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="text-uppercase fs-8 fw-bold text-muted mb-1">Product Categories</div>
                    <div class="fs-2 fw-bold text-dark lh-1">{{ $totalCategories }}</div>
                    <small class="text-muted fs-8">Active Therapeutic Classes</small>
                </div>
                <div class="bg-primary-subtle text-primary p-3 rounded-circle">
                    <i class="bi bi-tags fs-2"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card card-custom p-3 border-start border-info border-4 h-100">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="text-uppercase fs-8 fw-bold text-muted mb-1">Contact Inquiries</div>
                    <div class="fs-2 fw-bold text-dark lh-1">{{ $totalMessages }}</div>
                    <small class="text-danger fs-8 fw-medium"><i class="bi bi-envelope-exclamation me-1"></i> {{ $unreadMessages }} Unread Messages</small>
                </div>
                <div class="bg-info-subtle text-info p-3 rounded-circle">
                    <i class="bi bi-chat-left-text fs-2"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-6 col-xl-3">
        <div class="card card-custom p-3 border-start border-warning border-4 h-100">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <div class="text-uppercase fs-8 fw-bold text-muted mb-1">System Health</div>
                    <div class="fs-4 fw-bold text-dark lh-1">Optimal</div>
                    <small class="text-success fs-8 fw-medium"><i class="bi bi-shield-check me-1"></i> Laravel 12 + MySQL 8</small>
                </div>
                <div class="bg-warning-subtle text-warning p-3 rounded-circle">
                    <i class="bi bi-activity fs-2"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions Banner for Beginners -->
<div class="card card-custom p-3 p-md-4 mb-4 bg-white">
    <h5 class="fw-bold mb-3"><i class="bi bi-lightning-charge text-warning me-2"></i> Quick Action Center</h5>
    <div class="d-flex flex-wrap gap-2 gap-md-3">
        <a href="{{ route('admin.products.create') }}" class="btn btn-gdp btn-lg-custom w-100 w-sm-auto text-center flex-grow-1 flex-md-grow-0">
            <i class="bi bi-plus-circle me-2"></i> Add New Product
        </a>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-success btn-lg-custom w-100 w-sm-auto text-center flex-grow-1 flex-md-grow-0">
            <i class="bi bi-folder-plus me-2"></i> Manage Categories
        </a>
        <a href="{{ route('admin.media.index') }}" class="btn btn-outline-primary btn-lg-custom w-100 w-sm-auto text-center flex-grow-1 flex-md-grow-0">
            <i class="bi bi-cloud-upload me-2"></i> Upload Media
        </a>
        <a href="{{ route('admin.messages.index') }}" class="btn btn-outline-dark btn-lg-custom w-100 w-sm-auto text-center flex-grow-1 flex-md-grow-0">
            <i class="bi bi-envelope me-2"></i> View Messages
        </a>
    </div>
</div>

<!-- Tables Grid -->
<div class="row g-4">
    <!-- Recent Products Table -->
    <div class="col-12 col-lg-8">
        <div class="card card-custom h-100">
            <div class="card-header bg-transparent border-0 pt-4 px-4 d-flex justify-content-between align-items-center">
                <h5 class="fw-bold mb-0">Recent Products</h5>
                <a href="{{ route('admin.products.index') }}" class="text-success text-decoration-none fw-semibold fs-7">View All Products <i class="bi bi-arrow-right"></i></a>
            </div>
            <div class="card-body px-4 pb-4">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Product Name</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recentProducts as $prod)
                                <tr>
                                    <td>
                                        <div class="fw-bold text-dark">{{ $prod->name }}</div>
                                        <small class="text-muted">{{ $prod->generic_name }} ({{ $prod->strength }})</small>
                                    </td>
                                    <td>
                                        <span class="badge bg-light text-dark border">{{ $prod->category->name ?? 'Uncategorized' }}</span>
                                    </td>
                                    <td>
                                        @if($prod->status === 'published')
                                            <span class="badge bg-success-subtle text-success badge-status">Published</span>
                                        @elseif($prod->status === 'draft')
                                            <span class="badge bg-warning-subtle text-warning badge-status">Draft</span>
                                        @else
                                            <span class="badge bg-secondary-subtle text-secondary badge-status">Archived</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.products.edit', $prod) }}" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil me-1"></i> Edit</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center py-4 text-muted">No products found in the database.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Messages Side Panel -->
    <div class="col-12 col-lg-4">
        <div class="card card-custom h-100">
            <div class="card-header bg-transparent border-0 pt-4 px-4 d-flex justify-content-between align-items-center">
                <h5 class="fw-bold mb-0">Recent Messages</h5>
                <a href="{{ route('admin.messages.index') }}" class="text-success text-decoration-none fw-semibold fs-7">View Inbox</a>
            </div>
            <div class="card-body px-4 pb-4">
                @forelse($recentMessages as $msg)
                    <div class="p-3 mb-2 rounded bg-light border-start border-3 {{ $msg->is_read ? 'border-secondary' : 'border-danger bg-danger-subtle' }}">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <span class="fw-bold text-dark fs-7">{{ $msg->name }}</span>
                            <small class="text-muted fs-8">{{ $msg->created_at->diffForHumans() }}</small>
                        </div>
                        <div class="text-dark fs-7 text-truncate">{{ $msg->subject ?? 'Inquiry Message' }}</div>
                        <a href="{{ route('admin.messages.show', $msg) }}" class="fs-8 text-success fw-semibold text-decoration-none mt-1 d-inline-block">Read Message <i class="bi bi-arrow-right"></i></a>
                    </div>
                @empty
                    <div class="text-center py-4 text-muted">No messages received yet.</div>
                @endforelse
            </div>
        </div>
    </div>
</div>

@endsection
