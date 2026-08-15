<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    private function visibleProductsQuery()
    {
        $allowedSlugs = [
            'scabicod-soap',
            'tinea-soap',
            'scabvar-lotion',
            'greenstar-shampoo',
            'x-corel-g-tablet',
        ];

        return Product::where('status', 'published')
            ->whereIn('slug', $allowedSlugs);
    }

    protected function applySearchQuery($queryBuilder, string $searchQuery)
    {
        $term = trim($searchQuery);
        if (empty($term)) {
            return $queryBuilder;
        }

        $cleanTerm = preg_replace('/[^a-zA-Z0-9\s]/', '', $term);
        $noSpaceTerm = str_replace(' ', '', $cleanTerm);
        $words = array_filter(explode(' ', $cleanTerm));

        return $queryBuilder->where(function ($q) use ($term, $cleanTerm, $noSpaceTerm, $words) {
            $q->where('name', 'like', "%{$term}%")
              ->orWhere('generic_name', 'like', "%{$term}%")
              ->orWhere('brand_name', 'like', "%{$term}%")
              ->orWhere('active_ingredients', 'like', "%{$term}%")
              ->orWhere('search_aliases', 'like', "%{$term}%")
              ->orWhere('meta_keywords', 'like', "%{$term}%")
              ->orWhere('indications', 'like', "%{$term}%")
              ->orWhere('short_description', 'like', "%{$term}%");

            if (!empty($noSpaceTerm)) {
                $q->orWhere('search_aliases', 'like', "%{$noSpaceTerm}%")
                  ->orWhere('name', 'like', "%{$noSpaceTerm}%");
            }

            if (count($words) > 1) {
                $q->orWhere(function ($subQ) use ($words) {
                    foreach ($words as $w) {
                        if (strlen($w) >= 2) {
                            $subQ->where(function ($wQ) use ($w) {
                                $wQ->where('name', 'like', "%{$w}%")
                                   ->orWhere('generic_name', 'like', "%{$w}%")
                                   ->orWhere('brand_name', 'like', "%{$w}%")
                                   ->orWhere('search_aliases', 'like', "%{$w}%")
                                   ->orWhere('active_ingredients', 'like', "%{$w}%");
                            });
                        }
                    }
                });
            }
        });
    }

    public function index(Request $request): View
    {
        $query = $this->visibleProductsQuery();

        if ($request->filled('search')) {
            $this->applySearchQuery($query, $request->input('search'));
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

        $products = $query->paginate(12)->withQueryString();
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
        $product = $this->visibleProductsQuery()
            ->with(['images', 'faqs'])
            ->where('slug', $slug)
            ->firstOrFail();

        $relatedProducts = $this->visibleProductsQuery()
            ->where('id', '!=', $product->id)
            ->latest()
            ->take(4)
            ->get();

        return view('products.show', compact('product', 'relatedProducts'));
    }

    public function liveSearch(Request $request): JsonResponse
    {
        $query = trim($request->input('q', ''));

        if (strlen($query) < 2) {
            return response()->json([]);
        }

        $productsQuery = $this->visibleProductsQuery();
        $this->applySearchQuery($productsQuery, $query);

        $products = $productsQuery
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
