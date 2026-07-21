<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(Request $request): View
    {
        $query = Product::with('category')->where('status', 'published');

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('generic_name', 'like', "%{$search}%")
                    ->orWhere('brand_name', 'like', "%{$search}%")
                    ->orWhere('active_ingredients', 'like', "%{$search}%");
            });
        }

        if ($request->filled('category')) {
            $categorySlug = $request->input('category');
            $query->whereHas('category', function ($q) use ($categorySlug) {
                $q->where('slug', $categorySlug);
            });
        }

        if ($request->filled('sort')) {
            switch ($request->input('sort')) {
                case 'name_asc':
                    $query->orderBy('name', 'asc');
                    break;
                case 'name_desc':
                    $query->orderBy('name', 'desc');
                    break;
                case 'oldest':
                    $query->oldest();
                    break;
                default:
                    $query->latest();
                    break;
            }
        } else {
            $query->latest();
        }

        $products = $query->paginate(9)->withQueryString();
        $categories = Category::withCount(['products' => function ($q) {
            $q->where('status', 'published');
        }])->where('status', 'active')->get();

        $selectedCategory = $request->filled('category') 
            ? Category::where('slug', $request->input('category'))->first() 
            : null;

        return view('products.index', compact('products', 'categories', 'selectedCategory'));
    }

    public function show(string $slug): View
    {
        $product = Product::with(['category', 'images', 'faqs'])
            ->where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        $relatedProducts = Product::with('category')
            ->where('status', 'published')
            ->where('id', '!=', $product->id)
            ->where('category_id', $product->category_id)
            ->take(4)
            ->get();

        if ($relatedProducts->count() < 4) {
            $extra = Product::with('category')
                ->where('status', 'published')
                ->where('id', '!=', $product->id)
                ->whereNotIn('id', $relatedProducts->pluck('id'))
                ->take(4 - $relatedProducts->count())
                ->get();
            $relatedProducts = $relatedProducts->merge($extra);
        }

        return view('products.show', compact('product', 'relatedProducts'));
    }

    public function liveSearch(Request $request): JsonResponse
    {
        $query = $request->input('q', '');

        if (strlen($query) < 2) {
            return response()->json([]);
        }

        $products = Product::where('status', 'published')
            ->where(function ($q) use ($query) {
                $q->where('name', 'like', "%{$query}%")
                    ->orWhere('generic_name', 'like', "%{$query}%")
                    ->orWhere('brand_name', 'like', "%{$query}%");
            })
            ->take(6)
            ->get(['id', 'name', 'slug', 'generic_name', 'strength', 'featured_image']);

        $formatted = $products->map(function ($p) {
            return [
                'name' => $p->name,
                'generic_name' => $p->generic_name,
                'strength' => $p->strength,
                'url' => route('products.show', $p->slug),
                'image' => ($p->featured_image && file_exists(public_path($p->featured_image))) ? asset($p->featured_image) : null,
            ];
        });

        return response()->json($formatted);
    }
}
