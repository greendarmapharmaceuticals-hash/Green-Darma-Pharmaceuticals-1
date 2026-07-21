@extends('layouts.app')

@section('title', 'Contact Us | Green Darma Pharmaceuticals')
@section('meta_description', 'Contact Green Darma Pharmaceuticals. Reach out to our medical and sales team for product inquiries, doctor support, or distribution partnerships.')

@section('content')

<!-- Header Banner -->
<section class="bg-white border-bottom py-4">
    <div class="container text-center max-w-3xl mx-auto py-2">
        <span class="badge bg-success-subtle text-success fw-bold px-3 py-2 rounded-pill fs-7 mb-2">Get In Touch</span>
        <h1 class="display-6 fw-extrabold text-dark brand-font mb-2">Contact Green Darma Pharmaceuticals</h1>
        <p class="text-muted mb-0">Have questions about our products, therapeutic indications, or distribution network? Our team is ready to assist.</p>
    </div>
</section>

<!-- Contact Form & Details Section -->
<section class="py-5 bg-light">
    <div class="container">
        <!-- Success Flash Alert -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show card-custom border-0 border-start border-success border-4 mb-4 p-4" role="alert">
                <div class="d-flex align-items-center">
                    <i class="bi bi-check-circle-fill display-6 text-success me-3"></i>
                    <div>
                        <h5 class="fw-bold mb-1">Message Received!</h5>
                        <p class="mb-0 fs-7">{{ session('success') }}</p>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row g-4">
            <!-- Contact Info Col -->
            <div class="col-12 col-lg-5">
                <div class="card card-custom p-4 p-md-5 h-100 bg-white">
                    <h4 class="fw-bold text-dark brand-font mb-4">Official Contact Details</h4>

                    <div class="d-flex align-items-start mb-4">
                        <div class="bg-success-subtle text-success p-3 rounded-circle me-3">
                            <i class="bi bi-geo-alt-fill fs-4"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold text-dark mb-1">Corporate Head Office</h6>
                            <p class="text-muted fs-7 mb-0">{{ $company->address ?? 'Corporate Head Office, Dhaka, Bangladesh' }}</p>
                        </div>
                    </div>

                    <div class="d-flex align-items-start mb-4">
                        <div class="bg-success-subtle text-success p-3 rounded-circle me-3">
                            <i class="bi bi-telephone-fill fs-4"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold text-dark mb-1">Telephone & Support</h6>
                            <p class="text-muted fs-7 mb-0">{{ $company->phone ?? '+880 1700-000000' }}</p>
                        </div>
                    </div>

                    <div class="d-flex align-items-start mb-4">
                        <div class="bg-success-subtle text-success p-3 rounded-circle me-3">
                            <i class="bi bi-envelope-fill fs-4"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold text-dark mb-1">Official Email Inquiry</h6>
                            <p class="text-muted fs-7 mb-0">{{ $company->email ?? 'info@greendarma.com' }}</p>
                        </div>
                    </div>

                    <div class="d-flex align-items-start mb-4">
                        <div class="bg-success-subtle text-success p-3 rounded-circle me-3">
                            <i class="bi bi-clock-fill fs-4"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold text-dark mb-1">Office Hours</h6>
                            <p class="text-muted fs-7 mb-0">Saturday – Thursday: 9:00 AM – 6:00 PM<br>Friday: Closed</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Interactive Form Col -->
            <div class="col-12 col-lg-7">
                <div class="card card-custom p-4 p-md-5 bg-white">
                    <h4 class="fw-bold text-dark brand-font mb-2">Send Us an Inquiry</h4>
                    <p class="text-muted fs-7 mb-4">Fill out the form below and our medical communications team will get back to you.</p>

                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-12 col-md-6">
                                <label for="name" class="form-label fw-medium">Your Full Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required placeholder="e.g. Dr. Abdul Karim">
                                @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-12 col-md-6">
                                <label for="email" class="form-label fw-medium">Email Address <span class="text-danger">*</span></label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required placeholder="e.g. name@domain.com">
                                @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-12 col-md-6">
                                <label for="phone" class="form-label fw-medium">Phone Number</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" placeholder="+880 1700-000000">
                            </div>

                            <div class="col-12 col-md-6">
                                <label for="subject" class="form-label fw-medium">Inquiry Subject</label>
                                <input type="text" class="form-control" id="subject" name="subject" value="{{ old('subject') }}" placeholder="e.g. Product Inquiry / Distributorship">
                            </div>

                            <div class="col-12">
                                <label for="message" class="form-label fw-medium">Your Message <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="5" required placeholder="Write your message or clinical query here...">{{ old('message') }}</textarea>
                                @error('message')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-gdp-primary btn-lg w-100 shadow-sm">
                                    <i class="bi bi-send me-2"></i> Submit Inquiry Message
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Google Map Embed Section -->
<section class="py-0">
    <div class="ratio ratio-21x9 border-top border-bottom" style="max-height: 350px;">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d233667.822396495!2d90.25487771746206!3d23.78088745330349!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8b087026b81%3A0x8fa563bbdd5904c2!2sDhaka%2C%20Bangladesh!5e0!3m2!1sen!2sbd!4v1700000000000!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</section>

@endsection
