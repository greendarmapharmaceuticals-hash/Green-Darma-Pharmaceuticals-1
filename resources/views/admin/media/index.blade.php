@extends('admin.layouts.app')

@section('title', 'Media Library')
@section('page-title', 'Pharmaceutical Pack Shots & Media Library')

@section('content')

<!-- Header & Upload Button -->
<div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">
    <div>
        <h4 class="fw-bold mb-1">Media Gallery</h4>
        <p class="text-muted mb-0">Upload, view, and manage high-resolution studio pack shots and product images.</p>
    </div>
</div>

<!-- Upload Area Card -->
<div class="card card-custom p-4 mb-4 bg-white border-dashed text-center">
    <form action="{{ route('admin.media.upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <i class="bi bi-cloud-arrow-up display-3 text-success d-block mb-2"></i>
        <h5 class="fw-bold mb-1">Drag and Drop Images Here or Browse</h5>
        <p class="text-muted fs-7 mb-3">Upload pack shots, unit images, or infographics (JPG, PNG, WebP up to 5MB)</p>

        <div class="d-inline-flex gap-2">
            <input type="file" name="files[]" multiple class="form-control" accept="image/*" required>
            <button type="submit" class="btn btn-gdp text-nowrap"><i class="bi bi-upload me-1"></i> Upload Files</button>
        </div>
    </form>
</div>

<!-- Gallery Grid Card -->
<div class="card card-custom p-4">
    <h5 class="fw-bold mb-3">Uploaded Media Files ({{ $galleryImages->total() }})</h5>
    
    <div class="row g-3">
        @forelse($galleryImages as $img)
            <div class="col-6 col-sm-4 col-md-3 col-lg-2">
                <div class="card h-100 border p-2 text-center position-relative group">
                    <img src="{{ asset($img->image) }}" class="rounded img-fluid mb-2 object-fit-cover" style="height: 120px; width: 100%;">
                    <small class="text-truncate d-block fw-semibold text-dark fs-8">{{ $img->product->name ?? 'General Asset' }}</small>
                    
                    <form action="{{ route('admin.media.destroy', $img) }}" method="POST" class="mt-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger w-100 fs-8"><i class="bi bi-trash"></i> Delete</button>
                    </form>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5 text-muted">
                <i class="bi bi-images fs-1 d-block mb-2"></i>
                No gallery media uploaded yet. Use the uploader above to add images.
            </div>
        @endforelse
    </div>

    @if($galleryImages->hasPages())
        <div class="mt-4 d-flex justify-content-end">
            {{ $galleryImages->links() }}
        </div>
    @endif
</div>

@endsection
