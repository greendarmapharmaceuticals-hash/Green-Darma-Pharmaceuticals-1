@extends('admin.layouts.app')

@section('title', 'Contact Messages')
@section('page-title', 'Customer & Clinical Inquiry Messages')

@section('content')

<div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
    <div>
        <h4 class="fw-bold mb-1">Contact Messages Inbox</h4>
        <p class="text-muted mb-0">Review inquiries submitted by doctors, pharmacists, distributors, and customers.</p>
    </div>
</div>

<!-- Search & Status Filter -->
<div class="card card-custom p-3 mb-4">
    <form action="{{ route('admin.messages.index') }}" method="GET" class="row g-2 align-items-center">
        <div class="col-12 col-md-8">
            <div class="input-group">
                <span class="input-group-text bg-white"><i class="bi bi-search text-muted"></i></span>
                <input type="text" name="search" class="form-control border-start-0" placeholder="Search by name, email, or subject..." value="{{ request('search') }}">
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-2">
            <select name="status" class="form-select">
                <option value="">All Statuses</option>
                <option value="unread" {{ request('status') === 'unread' ? 'selected' : '' }}>Unread Only</option>
                <option value="read" {{ request('status') === 'read' ? 'selected' : '' }}>Read Only</option>
            </select>
        </div>
        <div class="col-12 col-sm-6 col-md-2">
            <button type="submit" class="btn btn-success w-100 fw-bold">Filter</button>
        </div>
    </form>
</div>

<!-- Messages Table Card -->
<div class="card card-custom">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Sender</th>
                        <th>Subject</th>
                        <th>Received Date</th>
                        <th>Status</th>
                        <th class="text-end pe-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($messages as $msg)
                        <tr class="{{ $msg->is_read ? '' : 'table-warning font-weight-bold' }}">
                            <td>
                                <div class="fw-bold text-dark">{{ $msg->name }}</div>
                                <small class="text-muted">{{ $msg->email }} {{ $msg->phone ? '('.$msg->phone.')' : '' }}</small>
                            </td>
                            <td>
                                <div class="fw-semibold text-dark">{{ $msg->subject ?? 'General Inquiry' }}</div>
                                <small class="text-muted text-truncate d-block" style="max-width: 280px;">{{ $msg->message }}</small>
                            </td>
                            <td><small class="text-muted">{{ $msg->created_at->format('M d, Y H:i A') }}</small></td>
                            <td>
                                @if($msg->is_read)
                                    <span class="badge bg-secondary-subtle text-secondary badge-status">Read</span>
                                @else
                                    <span class="badge bg-danger-subtle text-danger badge-status">Unread</span>
                                @endif
                            </td>
                            <td class="text-end pe-4">
                                <div class="btn-group">
                                    <a href="{{ route('admin.messages.show', $msg) }}" class="btn btn-sm btn-outline-primary"><i class="bi bi-eye"></i> View</a>
                                    <form action="{{ route('admin.messages.toggle-read', $msg) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-outline-secondary" title="Toggle Status"><i class="bi bi-check-circle"></i></button>
                                    </form>
                                    <form action="{{ route('admin.messages.destroy', $msg) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete message?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4 text-muted">No messages found in inbox.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($messages->hasPages())
            <div class="p-3 border-top d-flex justify-content-end">
                {{ $messages->links() }}
            </div>
        @endif
    </div>
</div>

@endsection
