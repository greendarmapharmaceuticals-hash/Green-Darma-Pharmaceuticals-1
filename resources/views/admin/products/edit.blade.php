@extends('admin.layouts.app')

@section('title', 'Edit Product')
@section('page-title', 'Edit Product: ' . $product->name)

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-1">Edit Product Details</h4>
        <p class="text-muted mb-0">Update clinical information, replace pack shots, or modify SEO settings.</p>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('admin.products.preview', $product) }}" class="btn btn-outline-info" target="_blank">
            <i class="bi bi-eye me-1"></i> Preview Page
        </a>
        <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> Back to Products List
        </a>
    </div>
</div>

<form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="card card-custom mb-4">
        <div class="card-header bg-white border-0 pt-3 pb-0 px-4">
            <ul class="nav nav-tabs card-header-tabs fw-bold" id="productTabs" role="tablist">
                <li class="nav-item"><button class="nav-link active py-3 px-4" id="step1-tab" data-bs-toggle="tab" data-bs-target="#step1" type="button"><i class="bi bi-info-circle me-2"></i> 1. Basic Info</button></li>
                <li class="nav-item"><button class="nav-link py-3 px-4" id="step2-tab" data-bs-toggle="tab" data-bs-target="#step2" type="button"><i class="bi bi-file-medical me-2"></i> 2. Clinical Details</button></li>
                <li class="nav-item"><button class="nav-link py-3 px-4" id="step3-tab" data-bs-toggle="tab" data-bs-target="#step3" type="button"><i class="bi bi-image me-2"></i> 3. Media & Gallery</button></li>
                <li class="nav-item"><button class="nav-link py-3 px-4" id="step4-tab" data-bs-toggle="tab" data-bs-target="#step4" type="button"><i class="bi bi-search me-2"></i> 4. SEO & Meta</button></li>
                <li class="nav-item"><button class="nav-link py-3 px-4" id="step5-tab" data-bs-toggle="tab" data-bs-target="#step5" type="button"><i class="bi bi-question-circle me-2"></i> 5. Product FAQs</button></li>
            </ul>
        </div>

        <div class="card-body p-4">
            <div class="tab-content">
                
                <!-- STEP 1: Basic Info -->
                <div class="tab-pane fade show active" id="step1">
                    <h5 class="fw-bold mb-3 text-success">General Product Overview</h5>
                    <div class="row g-3">
                        <div class="col-12 col-md-6">
                            <label for="name" class="form-label fw-bold">Product Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-lg" id="name" name="name" value="{{ old('name', $product->name) }}" required>
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="generic_name" class="form-label fw-bold">Generic Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control form-control-lg" id="generic_name" name="generic_name" value="{{ old('generic_name', $product->generic_name) }}" required>
                        </div>
                        <div class="col-12 col-md-4">
                            <label for="category_id" class="form-label fw-medium">Therapeutic Category</label>
                            <select class="form-select form-select-lg" id="category_id" name="category_id">
                                <option value="">Select Category...</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}" {{ old('category_id', $product->category_id) == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 col-md-4">
                            <label for="brand_name" class="form-label fw-medium">Brand Name</label>
                            <input type="text" class="form-control form-control-lg" id="brand_name" name="brand_name" value="{{ old('brand_name', $product->brand_name) }}">
                        </div>
                        <div class="col-12 col-md-4">
                            <label for="manufacturer" class="form-label fw-medium">Manufacturer</label>
                            <input type="text" class="form-control form-control-lg" id="manufacturer" name="manufacturer" value="{{ old('manufacturer', $product->manufacturer) }}">
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="dar_number" class="form-label fw-medium">DGDA DAR Registration Number</label>
                            <input type="text" class="form-control" id="dar_number" name="dar_number" value="{{ old('dar_number', $product->dar_number) }}">
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="status" class="form-label fw-bold">Publishing Status <span class="text-danger">*</span></label>
                            <select class="form-select form-select-lg fw-bold" id="status" name="status" required>
                                <option value="published" {{ old('status', $product->status) == 'published' ? 'selected' : '' }}>Published (Live)</option>
                                <option value="draft" {{ old('status', $product->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                                <option value="archived" {{ old('status', $product->status) == 'archived' ? 'selected' : '' }}>Archived</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- STEP 2: Clinical Details -->
                <div class="tab-pane fade" id="step2">
                    <h5 class="fw-bold mb-3 text-success">Clinical & Dosage Specifications</h5>
                    <div class="row g-3">
                        <div class="col-12 col-md-4">
                            <label for="strength" class="form-label fw-medium">Strength</label>
                            <input type="text" class="form-control" id="strength" name="strength" value="{{ old('strength', $product->strength) }}">
                        </div>
                        <div class="col-12 col-md-4">
                            <label for="dosage_form" class="form-label fw-medium">Dosage Form</label>
                            <input type="text" class="form-control" id="dosage_form" name="dosage_form" value="{{ old('dosage_form', $product->dosage_form) }}">
                        </div>
                        <div class="col-12 col-md-4">
                            <label for="pack_size" class="form-label fw-medium">Pack Size</label>
                            <input type="text" class="form-control" id="pack_size" name="pack_size" value="{{ old('pack_size', $product->pack_size) }}">
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="price" class="form-label fw-medium">Official MRP (BDT)</label>
                            <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ old('price', $product->price) }}">
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="market_price_range" class="form-label fw-medium">Market Reference Price Range</label>
                            <input type="text" class="form-control" id="market_price_range" name="market_price_range" value="{{ old('market_price_range', $product->market_price_range) }}">
                        </div>
                        <div class="col-12">
                            <label for="active_ingredients" class="form-label fw-medium">Active Ingredients Composition</label>
                            <textarea class="form-control" id="active_ingredients" name="active_ingredients" rows="2">{{ old('active_ingredients', $product->active_ingredients) }}</textarea>
                        </div>
                        <div class="col-12">
                            <label for="short_description" class="form-label fw-medium">Short Summary Description</label>
                            <textarea class="form-control" id="short_description" name="short_description" rows="2">{{ old('short_description', $product->short_description) }}</textarea>
                        </div>
                        <div class="col-12">
                            <label for="full_description" class="form-label fw-medium">Detailed Product Description</label>
                            <textarea class="form-control" id="full_description" name="full_description" rows="4">{{ old('full_description', $product->full_description) }}</textarea>
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="pharmacology" class="form-label fw-medium">Pharmacology</label>
                            <textarea class="form-control" id="pharmacology" name="pharmacology" rows="3">{{ old('pharmacology', $product->pharmacology) }}</textarea>
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="indications" class="form-label fw-medium">Indications</label>
                            <textarea class="form-control" id="indications" name="indications" rows="3">{{ old('indications', $product->indications) }}</textarea>
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="dosage" class="form-label fw-medium">Dosage & Administration</label>
                            <textarea class="form-control" id="dosage" name="dosage" rows="3">{{ old('dosage', $product->dosage) }}</textarea>
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="side_effects" class="form-label fw-medium">Side Effects</label>
                            <textarea class="form-control" id="side_effects" name="side_effects" rows="3">{{ old('side_effects', $product->side_effects) }}</textarea>
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="contraindications" class="form-label fw-medium">Contraindications</label>
                            <textarea class="form-control" id="contraindications" name="contraindications" rows="3">{{ old('contraindications', $product->contraindications) }}</textarea>
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="storage" class="form-label fw-medium">Storage Conditions</label>
                            <textarea class="form-control" id="storage" name="storage" rows="3">{{ old('storage', $product->storage) }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- STEP 3: Media & Gallery -->
                <div class="tab-pane fade" id="step3">
                    <h5 class="fw-bold mb-3 text-success">Product Media Management</h5>
                    <div class="row g-3">
                        <div class="col-12 col-md-6">
                            <div class="card p-3 border">
                                <label for="featured_image" class="form-label fw-bold">Replace Featured Image</label>
                                @if($product->featured_image && file_exists(public_path($product->featured_image)))
                                    <div class="mb-2">
                                        <img src="{{ asset($product->featured_image) }}" alt="Featured" class="img-thumbnail" style="max-height: 120px;">
                                    </div>
                                @endif
                                <input type="file" class="form-control" id="featured_image" name="featured_image" accept="image/*">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="card p-3 border">
                                <label for="gallery_images" class="form-label fw-bold">Add Additional Gallery Images</label>
                                @if($product->images->count() > 0)
                                    <div class="d-flex gap-2 mb-2 flex-wrap">
                                        @foreach($product->images as $gImg)
                                            <img src="{{ asset($gImg->image) }}" class="img-thumbnail" style="width: 60px; height: 60px; object-fit: cover;">
                                        @endforeach
                                    </div>
                                @endif
                                <input type="file" class="form-control" id="gallery_images" name="gallery_images[]" multiple accept="image/*">
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="image_alt" class="form-label fw-medium">Image ALT Tag Text</label>
                            <input type="text" class="form-control" id="image_alt" name="image_alt" value="{{ old('image_alt', $product->image_alt) }}">
                        </div>
                    </div>
                </div>

                <!-- STEP 4: SEO & Meta -->
                <div class="tab-pane fade" id="step4">
                    <h5 class="fw-bold mb-3 text-success">SEO Settings</h5>
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="seo_title" class="form-label fw-medium">SEO Meta Title</label>
                            <input type="text" class="form-control" id="seo_title" name="seo_title" value="{{ old('seo_title', $product->seo_title) }}">
                        </div>
                        <div class="col-12">
                            <label for="meta_description" class="form-label fw-medium">SEO Meta Description</label>
                            <textarea class="form-control" id="meta_description" name="meta_description" rows="3">{{ old('meta_description', $product->meta_description) }}</textarea>
                        </div>
                        <div class="col-12">
                            <label for="meta_keywords" class="form-label fw-medium">Meta Keywords</label>
                            <input type="text" class="form-control" id="meta_keywords" name="meta_keywords" value="{{ old('meta_keywords', $product->meta_keywords) }}">
                        </div>
                    </div>
                </div>

                <!-- STEP 5: Product FAQs -->
                <div class="tab-pane fade" id="step5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="fw-bold mb-0 text-success">Product FAQs</h5>
                        <button type="button" class="btn btn-sm btn-outline-success" id="addFaqBtn"><i class="bi bi-plus-circle me-1"></i> Add Question</button>
                    </div>

                    <div id="faqContainer">
                        @forelse($product->faqs as $index => $faq)
                            <div class="faq-item card p-3 mb-3 border">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="fw-bold text-dark">Question {{ $index + 1 }}</span>
                                    <button type="button" class="btn btn-sm btn-outline-danger remove-faq"><i class="bi bi-trash"></i> Remove</button>
                                </div>
                                <div class="row g-2">
                                    <div class="col-12">
                                        <input type="text" name="faqs[{{ $index }}][question]" class="form-control" value="{{ $faq->question }}">
                                    </div>
                                    <div class="col-12">
                                        <textarea name="faqs[{{ $index }}][answer]" class="form-control" rows="2">{{ $faq->answer }}</textarea>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="faq-item card p-3 mb-3 border">
                                <div class="row g-2">
                                    <div class="col-12">
                                        <label class="form-label fw-bold">Question 1</label>
                                        <input type="text" name="faqs[0][question]" class="form-control">
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label fw-medium">Answer 1</label>
                                        <textarea name="faqs[0][answer]" class="form-control" rows="2"></textarea>
                                    </div>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>

            </div>
        </div>

        <div class="card-footer bg-light p-3 d-flex justify-content-end gap-2">
            <button type="submit" class="btn btn-gdp btn-lg-custom">
                <i class="bi bi-check-circle me-2"></i> Update Product
            </button>
        </div>
    </div>
</form>

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        let faqIndex = {{ $product->faqs->count() ?: 1 }};
        const addBtn = document.getElementById('addFaqBtn');
        const container = document.getElementById('faqContainer');

        if (addBtn) {
            addBtn.addEventListener('click', function () {
                const faqHtml = `
                    <div class="faq-item card p-3 mb-3 border">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="fw-bold text-dark">Question ${faqIndex + 1}</span>
                            <button type="button" class="btn btn-sm btn-outline-danger remove-faq"><i class="bi bi-trash"></i> Remove</button>
                        </div>
                        <div class="row g-2">
                            <div class="col-12">
                                <input type="text" name="faqs[${faqIndex}][question]" class="form-control" placeholder="Question string...">
                            </div>
                            <div class="col-12">
                                <textarea name="faqs[${faqIndex}][answer]" class="form-control" rows="2" placeholder="Answer string..."></textarea>
                            </div>
                        </div>
                    </div>
                `;
                container.insertAdjacentHTML('beforeend', faqHtml);
                faqIndex++;
            });

            container.addEventListener('click', function (e) {
                if (e.target.classList.contains('remove-faq') || e.target.closest('.remove-faq')) {
                    const item = e.target.closest('.faq-item');
                    if (item) item.remove();
                }
            });
        }
    });
</script>
@endpush
