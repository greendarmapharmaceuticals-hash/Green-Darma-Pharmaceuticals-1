<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function show(string $slug): View
    {
        $category = Category::where('slug', $slug)
            ->where('status', 'active')
            ->firstOrFail();

        $products = Product::with('category')
            ->where('category_id', $category->id)
            ->where('status', 'published')
            ->whereIn('slug', [
                'scabicod-soap',
                'tinea-soap',
                'scabvar-lotion',
                'greenstar-shampoo',
                'x-corel-g-tablet',
            ])
            ->latest()
            ->paginate(9);

        $categories = Category::withCount(['products' => function ($q) {
            $q->where('status', 'published');
        }])->where('status', 'active')->get();

        return view('products.index', [
            'products' => $products,
            'categories' => $categories,
            'selectedCategory' => $category,
        ]);
    }
}
