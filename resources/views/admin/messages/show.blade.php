@extends('admin.layouts.app')

@section('title', 'View Message')
@section('page-title', 'Message Details')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold mb-0">Inquiry Message View</h4>
    <a href="{{ route('admin.messages.index') }}" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left me-1"></i> Back to Inbox
    </a>
</div>

<div class="card card-custom p-4">
    <div class="border-bottom pb-3 mb-3">
        <div class="d-flex justify-content-between align-items-center">
            <h4 class="fw-bold text-dark mb-1">{{ $message->subject ?? 'General Inquiry' }}</h4>
            <span class="text-muted fs-7">{{ $message->created_at->format('F d, Y \a\t g:i A') }}</span>
        </div>
        <div class="mt-2 fs-6">
            <strong>From:</strong> {{ $message->name }} &lt;<a href="mailto:{{ $message->email }}" class="text-success">{{ $message->email }}</a>&gt;
            @if($message->phone) | <strong>Phone:</strong> {{ $message->phone }} @endif
        </div>
    </div>

    <div class="p-3 bg-light rounded border fs-6 text-dark mb-4 style-message" style="white-space: pre-wrap;">{{ $message->message }}</div>

    <div class="d-flex gap-2">
        <a href="mailto:{{ $message->email }}?subject=RE: {{ urlencode($message->subject ?? 'Inquiry Response') }}" class="btn btn-gdp">
            <i class="bi bi-reply me-1"></i> Reply via Email
        </a>
        <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" onsubmit="return confirm('Delete this message?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-outline-danger"><i class="bi bi-trash me-1"></i> Delete Message</button>
        </form>
    </div>
</div>

@endsection
