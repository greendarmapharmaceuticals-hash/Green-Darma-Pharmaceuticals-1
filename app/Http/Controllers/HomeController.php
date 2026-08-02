<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CompanySetting;
use App\Models\Product;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $company = null;
        try {
            if (\Illuminate\Support\Facades\Schema::hasTable('company_settings')) {
                $company = CompanySetting::first();
            }
        } catch (\Throwable $e) {}
        
        $featuredProducts = Product::with('category')
            ->where('status', 'published')
            ->where('is_featured', true)
            ->whereIn('slug', [
                'scabicod-soap',
                'tinea-soap',
                'scabvar-lotion',
                'greenstar-shampoo',
                'x-corel-g-tablet',
            ])
            ->latest()
            ->take(6)
            ->get();

        if ($featuredProducts->isEmpty()) {
            $featuredProducts = Product::with('category')
                ->where('status', 'published')
                ->whereIn('slug', [
                    'scabicod-soap',
                    'tinea-soap',
                    'scabvar-lotion',
                    'greenstar-shampoo',
                    'x-corel-g-tablet',
                ])
                ->latest()
                ->take(6)
                ->get();
        }

        $categories = Category::withCount(['products' => function ($q) {
            $q->where('status', 'published');
        }])->where('status', 'active')->get();

        $latestProducts = Product::with('category')
            ->where('status', 'published')
            ->whereIn('slug', [
                'scabicod-soap',
                'tinea-soap',
                'scabvar-lotion',
                'greenstar-shampoo',
                'x-corel-g-tablet',
            ])
            ->latest()
            ->take(8)
            ->get();

        return view('home', compact('company', 'featuredProducts', 'categories', 'latestProducts'));
    }
}
