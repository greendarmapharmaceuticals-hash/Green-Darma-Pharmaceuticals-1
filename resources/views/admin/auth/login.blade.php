<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Green Darma Pharmaceuticals</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f1f5f9;
            font-family: system-ui, -apple-system, sans-serif;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            width: 100%;
            max-width: 420px;
            border: none;
            border-radius: 16px;
            box-shadow: 0 10px 25px -5px rgba(0,0,0,0.08);
        }
        .btn-gdp {
            background-color: #1b4d3e;
            color: #fff;
            font-weight: 600;
            padding: 0.75rem;
            border-radius: 8px;
        }
        .btn-gdp:hover {
            background-color: #2c8562;
            color: #fff;
        }
    </style>
</head>
<body>

    <div class="card login-card p-4 bg-white">
        <div class="text-center mb-4">
            @if(isset($companySetting) && $companySetting?->logo)
                <img src="{{ asset($companySetting->logo) }}" alt="Logo" class="mb-3" style="max-height: 80px; width: auto; object-fit: contain;">
            @else
                <div class="bg-success-subtle text-success d-inline-flex p-3 rounded-circle mb-3">
                    <i class="bi bi-capsule-capsule fs-1"></i>
                </div>
            @endif
            <h3 class="fw-bold text-dark mb-1">Green Darma Admin</h3>
            <p class="text-muted fs-7">Enter your credentials to access the management portal</p>
        </div>

        @if(session('success'))
            <div class="alert alert-success py-2 fs-7 mb-3">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger py-2 fs-7 mb-3">{{ session('error') }}</div>
        @endif

        <form action="/admin/login" method="POST">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label fw-medium">Email Address</label>
                <div class="input-group">
                    <span class="input-group-text bg-light border-end-0"><i class="bi bi-envelope text-muted"></i></span>
                    <input type="email" class="form-control border-start-0 ps-0 @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autofocus placeholder="admin@greendarma.com">
                </div>
                @error('email')
                    <div class="text-danger fs-8 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label fw-medium">Password</label>
                <div class="input-group">
                    <span class="input-group-text bg-light border-end-0"><i class="bi bi-lock text-muted"></i></span>
                    <input type="password" class="form-control border-start-0 ps-0 @error('password') is-invalid @enderror" id="password" name="password" required placeholder="••••••••">
                </div>
                @error('password')
                    <div class="text-danger fs-8 mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4 d-flex justify-content-between align-items-center">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                    <label class="form-check-label fs-7 text-muted" for="remember">Remember me</label>
                </div>
            </div>

            <button type="submit" class="btn btn-gdp w-100 mb-3">
                <i class="bi bi-box-arrow-in-right me-2"></i> Log In to Dashboard
            </button>
        </form>

        <div class="text-center text-muted fs-8 mt-2">
            Green Darma Pharmaceuticals © 2026
        </div>
    </div>

</body>
</html>
