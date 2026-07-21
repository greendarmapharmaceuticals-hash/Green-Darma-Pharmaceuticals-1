<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\CompanyController as AdminCompanyController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\MediaController as AdminMediaController;
use App\Http\Controllers\Admin\MessageController as AdminMessageController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Admin\SeoController as AdminSeoController;
use App\Http\Middleware\AdminAuthenticate;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Admin Routes Group
Route::prefix('admin')->name('admin.')->group(function () {
    // Auth Guest Routes
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

    // Authenticated Admin Routes
    Route::middleware(AdminAuthenticate::class)->group(function () {
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

        // Dashboard
        Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');

        // Products CRUD
        Route::get('/products/{product}/duplicate', [AdminProductController::class, 'duplicate'])->name('products.duplicate');
        Route::get('/products/{product}/preview', [AdminProductController::class, 'preview'])->name('products.preview');
        Route::post('/products/{product}/toggle-status', [AdminProductController::class, 'toggleStatus'])->name('products.toggle-status');
        Route::resource('/products', AdminProductController::class);

        // Categories CRUD
        Route::resource('/categories', AdminCategoryController::class)->except(['create', 'show', 'edit']);

        // Media Library
        Route::get('/media', [AdminMediaController::class, 'index'])->name('media.index');
        Route::post('/media/upload', [AdminMediaController::class, 'upload'])->name('media.upload');
        Route::delete('/media/{image}', [AdminMediaController::class, 'destroy'])->name('media.destroy');

        // Company Settings
        Route::get('/company', [AdminCompanyController::class, 'index'])->name('company.index');
        Route::put('/company', [AdminCompanyController::class, 'update'])->name('company.update');

        // SEO Manager
        Route::get('/seo', [AdminSeoController::class, 'index'])->name('seo.index');
        Route::put('/seo', [AdminSeoController::class, 'update'])->name('seo.update');

        // Messages
        Route::get('/messages', [AdminMessageController::class, 'index'])->name('messages.index');
        Route::get('/messages/{message}', [AdminMessageController::class, 'show'])->name('messages.show');
        Route::post('/messages/{message}/toggle-read', [AdminMessageController::class, 'toggleRead'])->name('messages.toggle-read');
        Route::delete('/messages/{message}', [AdminMessageController::class, 'destroy'])->name('messages.destroy');

        // Profile & Security
        Route::get('/profile', [AdminProfileController::class, 'index'])->name('profile.index');
        Route::put('/profile', [AdminProfileController::class, 'updateProfile'])->name('profile.update');
        Route::put('/password', [AdminProfileController::class, 'updatePassword'])->name('password.update');
    });
});
