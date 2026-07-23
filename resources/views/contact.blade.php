@extends('layouts.app')

@section('title', 'Contact Us | Green Darma Pharmaceuticals')
@section('meta_description', 'Contact Green Darma Pharmaceuticals. Reach out to our medical and sales team for product inquiries, doctor support, or distribution partnerships.')

@section('content')

<!-- Support Center Hero Banner -->
<section class="position-relative text-white py-5 overflow-hidden" style="background: linear-gradient(135deg, #0d2b21 0%, #154536 60%, #082119 100%);">
    <div class="container position-relative z-1 py-3 text-center max-w-4xl mx-auto">
        <span class="badge bg-success text-white border border-light border-opacity-25 px-3 py-2 rounded-pill fs-7 mb-3 shadow-sm">
            <i class="bi bi-headset me-1"></i> Medical Communication & Support Center
        </span>
        <h1 class="display-5 fw-extrabold text-white brand-font mb-3">
            How Can We Assist You Today?
        </h1>
        <p class="lead text-white-50 mb-0 fs-6 max-w-2xl mx-auto">
            Whether you are a physician requesting medical literature, a distributor seeking partnership, or a patient with a query, our team is ready to respond.
        </p>
    </div>
</section>

<!-- Multi-Channel Support Cards -->
<section class="py-4 bg-white border-bottom shadow-xs">
    <div class="container">
        <div class="row g-4">
            <div class="col-12 col-md-4">
                <div class="p-3 d-flex align-items-center rounded-3 bg-light border">
                    <div class="bg-success text-white p-3 rounded-circle me-3">
                        <i class="bi bi-person-badge fs-4"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold text-dark mb-0">Doctor & Medical Query</h6>
                        <small class="text-muted">Clinical pharmacology & samples</small>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="p-3 d-flex align-items-center rounded-3 bg-light border">
                    <div class="bg-success text-white p-3 rounded-circle me-3">
                        <i class="bi bi-shop fs-4"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold text-dark mb-0">Trade & Distribution</h6>
                        <small class="text-muted">Chemist & pharmacy dealership</small>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="p-3 d-flex align-items-center rounded-3 bg-light border">
                    <div class="bg-success text-white p-3 rounded-circle me-3">
                        <i class="bi bi-telephone-out fs-4"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold text-dark mb-0">Corporate Helpline</h6>
                        <small class="text-muted">Sat – Thu: 9:00 AM – 6:00 PM</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Main Support & Form Section -->
<section class="py-5" style="background-color: #f8fafc;">
    <div class="container py-3">
        <!-- Success Alert -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show border-0 border-start border-success border-4 mb-4 p-4 shadow-sm rounded-4 bg-white" role="alert">
                <div class="d-flex align-items-center">
                    <i class="bi bi-check-circle-fill display-6 text-success me-3"></i>
                    <div>
                        <h5 class="fw-bold text-dark mb-1">Message Received!</h5>
                        <p class="mb-0 text-secondary fs-7">{{ session('success') }}</p>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row g-4">
            <!-- Contact Info Col -->
            <div class="col-12 col-lg-5">
                <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 h-100 bg-white">
                    <h4 class="fw-bold text-dark brand-font mb-4">Official Contact Channels</h4>

                    <div class="d-flex align-items-start mb-4">
                        <div class="bg-success-subtle text-success p-3 rounded-circle me-3 flex-shrink-0">
                            <i class="bi bi-geo-alt-fill fs-4"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold text-dark mb-1">Corporate Head Office</h6>
                            <p class="text-muted fs-7 mb-0">{{ $company->address ?? 'Corporate Head Office, Dhaka, Bangladesh' }}</p>
                        </div>
                    </div>

                    <div class="d-flex align-items-start mb-4">
                        <div class="bg-success-subtle text-success p-3 rounded-circle me-3 flex-shrink-0">
                            <i class="bi bi-telephone-fill fs-4"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold text-dark mb-1">Phone & Customer Care</h6>
                            <p class="text-muted fs-7 mb-0">{{ $company->phone ?? '+880 1700-000000' }}</p>
                        </div>
                    </div>

                    <div class="d-flex align-items-start mb-4">
                        <div class="bg-success-subtle text-success p-3 rounded-circle me-3 flex-shrink-0">
                            <i class="bi bi-envelope-fill fs-4"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold text-dark mb-1">Official Inquiry Email</h6>
                            <p class="text-muted fs-7 mb-0">{{ $company->email ?? 'info@greendarma.com' }}</p>
                        </div>
                    </div>

                    <div class="d-flex align-items-start mb-4">
                        <div class="bg-success-subtle text-success p-3 rounded-circle me-3 flex-shrink-0">
                            <i class="bi bi-clock-fill fs-4"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold text-dark mb-1">Operating Hours</h6>
                            <p class="text-muted fs-7 mb-0">Saturday – Thursday: 9:00 AM – 6:00 PM<br>Friday: Closed</p>
                        </div>
                    </div>

                    <div class="mt-auto pt-4 border-top">
                        <span class="fs-8 text-uppercase fw-bold text-muted d-block mb-2">Connect With Us</span>
                        <div class="d-flex gap-3 fs-5">
                            @if($company?->facebook)<a href="{{ $company->facebook }}" target="_blank" class="text-success"><i class="bi bi-facebook"></i></a>@endif
                            @if($company?->linkedin)<a href="{{ $company->linkedin }}" target="_blank" class="text-success"><i class="bi bi-linkedin"></i></a>@endif
                            @if($company?->youtube)<a href="{{ $company->youtube }}" target="_blank" class="text-success"><i class="bi bi-youtube"></i></a>@endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Col -->
            <div class="col-12 col-lg-7">
                <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 bg-white">
                    <h4 class="fw-bold text-dark brand-font mb-2">Send an Official Message</h4>
                    <p class="text-muted fs-7 mb-4">Complete the form below and our response coordinator will contact you within 24 hours.</p>

                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-12 col-md-6">
                                <label for="name" class="form-label fw-semibold text-dark fs-7">Your Full Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control rounded-3 py-2 @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required placeholder="e.g. Dr. Abdul Karim">
                                @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-12 col-md-6">
                                <label for="email" class="form-label fw-semibold text-dark fs-7">Email Address <span class="text-danger">*</span></label>
                                <input type="email" class="form-control rounded-3 py-2 @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required placeholder="e.g. name@domain.com">
                                @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-12 col-md-6">
                                <label for="phone" class="form-label fw-semibold text-dark fs-7">Phone / Mobile Number</label>
                                <input type="text" class="form-control rounded-3 py-2" id="phone" name="phone" value="{{ old('phone') }}" placeholder="+880 1700-000000">
                            </div>

                            <div class="col-12 col-md-6">
                                <label for="subject" class="form-label fw-semibold text-dark fs-7">Inquiry Category</label>
                                <select class="form-select rounded-3 py-2" id="subject" name="subject">
                                    <option value="General Inquiry">General Product Inquiry</option>
                                    <option value="Doctor & Clinical Query">Doctor / Medical Query</option>
                                    <option value="Distributorship Inquiry">Distributorship / Dealership</option>
                                    <option value="Product Feedback">Product Quality Feedback</option>
                                </select>
                            </div>

                            <div class="col-12">
                                <label for="message" class="form-label fw-semibold text-dark fs-7">Message / Detailed Query <span class="text-danger">*</span></label>
                                <textarea class="form-control rounded-3 @error('message') is-invalid @enderror" id="message" name="message" rows="5" required placeholder="Write your message or inquiry details here...">{{ old('message') }}</textarea>
                                @error('message')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-12 pt-2">
                                <button type="submit" class="btn btn-gdp-primary btn-lg w-100 rounded-3 shadow-sm py-3 fs-6">
                                    <i class="bi bi-send-fill me-2"></i> Send Support Inquiry
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Support FAQ Accordion Section -->
<section class="py-5 bg-white border-top">
    <div class="container py-3 max-w-3xl mx-auto">
        <div class="text-center mb-5">
            <span class="badge bg-success-subtle text-success fw-bold px-3 py-2 rounded-pill fs-8 mb-2">Frequently Asked Questions</span>
            <h3 class="fw-bold text-dark brand-font">Common Support Queries</h3>
        </div>

        <div class="accordion accordion-flush shadow-sm rounded-4 overflow-hidden border" id="supportFaqAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button fw-semibold text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                        How can a pharmacy or chemist apply for dealership/distribution?
                    </button>
                </h2>
                <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#supportFaqAccordion">
                    <div class="accordion-body text-secondary fs-7">
                        You can send a message using the form above with the category "Distributorship / Dealership" or contact our sales hotline directly. Our regional trade representative will follow up with registration guidelines.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed fw-semibold text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                        Are Green Darma products DGDA registered?
                    </button>
                </h2>
                <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#supportFaqAccordion">
                    <div class="accordion-body text-secondary fs-7">
                        Yes, every product manufactured and distributed by Green Darma Pharmaceuticals is fully registered and compliant with the Directorate General of Drug Administration (DGDA), Bangladesh.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed fw-semibold text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                        How can medical practitioners request product literature or samples?
                    </button>
                </h2>
                <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#supportFaqAccordion">
                    <div class="accordion-body text-secondary fs-7">
                        Physicians and medical professionals can select "Doctor / Medical Query" in the contact form or email info@greendarma.com with their medical registration number to receive trial samples and detailed scientific literature.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Google Map -->
<section class="py-0">
    <div class="ratio ratio-21x9 border-top" style="max-height: 350px;">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d233667.822396495!2d90.25487771746206!3d23.78088745330349!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8b087026b81%3A0x8fa563bbdd5904c2!2sDhaka%2C%20Bangladesh!5e0!3m2!1sen!2sbd!4v1700000000000!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</section>

@endsection

