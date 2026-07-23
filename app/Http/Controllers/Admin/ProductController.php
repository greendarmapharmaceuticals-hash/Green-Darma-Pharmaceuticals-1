<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductFaq;
use App\Models\ProductImage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(Request $request): View
    {
        $query = Product::with('category');

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('generic_name', 'like', "%{$search}%")
                    ->orWhere('brand_name', 'like', "%{$search}%");
            });
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->input('category_id'));
        }

        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }

        $products = $query->latest()->paginate(10)->withQueryString();
        $categories = Category::where('status', 'active')->orderBy('name')->get();

        return view('admin.products.index', compact('products', 'categories'));
    }

    public function create(): View
    {
        $categories = Category::where('status', 'active')->orderBy('name')->get();
        return view('admin.products.create', compact('categories'));
    }

    public function store(StoreProductRequest $request): RedirectResponse
    {
        $data = $request->validated();
        if (empty($data['slug'])) {
            $sourceName = !empty($data['brand_name']) ? $data['brand_name'] : trim(preg_replace('/\s*\(.*?\)/', '', $data['name']));
            $baseSlug = Str::slug($sourceName);
        } else {
            $baseSlug = Str::slug($data['slug']);
        }
        $data['slug'] = $baseSlug;

        // Ensure unique slug
        $count = Product::where('slug', $baseSlug)->orWhere('slug', 'like', $baseSlug . '-%')->count();
        if ($count > 0) {
            $data['slug'] .= '-' . ($count + 1);
        }

        // Handle Featured Image Upload
        if ($request->hasFile('featured_image')) {
            $file = $request->file('featured_image');
            $filename = 'product_' . time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('products', $filename, 'public');
            $data['featured_image'] = 'storage/' . $path;
        }

        $product = Product::create($data);

        // Handle Gallery Images Upload
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $index => $galleryFile) {
                $gFilename = 'gallery_' . time() . '_' . $index . '_' . Str::random(8) . '.' . $galleryFile->getClientOriginalExtension();
                $gPath = $galleryFile->storeAs('products', $gFilename, 'public');
                ProductImage::create([
                    'product_id' => $product->id,
                    'image' => 'storage/' . $gPath,
                    'sort_order' => $index + 1,
                    'alt_text' => $product->name,
                ]);
            }
        }

        // Handle FAQs Repeater
        if ($request->has('faqs') && is_array($request->input('faqs'))) {
            foreach ($request->input('faqs') as $index => $faqData) {
                if (!empty($faqData['question']) && !empty($faqData['answer'])) {
                    ProductFaq::create([
                        'product_id' => $product->id,
                        'question' => $faqData['question'],
                        'answer' => $faqData['answer'],
                        'sort_order' => $index + 1,
                    ]);
                }
            }
        }

        return redirect()->route('admin.products.index')
            ->with('success', 'Product "' . $product->name . '" created successfully!');
    }

    public function edit(Product $product): View
    {
        $product->load(['images', 'faqs']);
        $categories = Category::where('status', 'active')->orderBy('name')->get();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(UpdateProductRequest $request, Product $product): RedirectResponse
    {
        $data = $request->validated();

        if (empty($data['slug'])) {
            $sourceName = !empty($data['brand_name']) ? $data['brand_name'] : trim(preg_replace('/\s*\(.*?\)/', '', $data['name']));
            $data['slug'] = Str::slug($sourceName);
        } else {
            $data['slug'] = Str::slug($data['slug']);
        }

        // Handle Featured Image Replacement
        if ($request->hasFile('featured_image')) {
            if ($product->featured_image && file_exists(public_path($product->featured_image))) {
                @unlink(public_path($product->featured_image));
            }
            $file = $request->file('featured_image');
            $filename = 'product_' . time() . '_' . Str::random(8) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('products', $filename, 'public');
            $data['featured_image'] = 'storage/' . $path;
        }

        $product->update($data);

        // Handle Additional Gallery Images
        if ($request->hasFile('gallery_images')) {
            $currentSort = $product->images()->max('sort_order') ?? 0;
            foreach ($request->file('gallery_images') as $index => $galleryFile) {
                $gFilename = 'gallery_' . time() . '_' . $index . '_' . Str::random(8) . '.' . $galleryFile->getClientOriginalExtension();
                $gPath = $galleryFile->storeAs('products', $gFilename, 'public');
                ProductImage::create([
                    'product_id' => $product->id,
                    'image' => 'storage/' . $gPath,
                    'sort_order' => $currentSort + $index + 1,
                    'alt_text' => $product->name,
                ]);
            }
        }

        // Handle FAQs Update
        if ($request->has('faqs') && is_array($request->input('faqs'))) {
            $product->faqs()->delete();
            foreach ($request->input('faqs') as $index => $faqData) {
                if (!empty($faqData['question']) && !empty($faqData['answer'])) {
                    ProductFaq::create([
                        'product_id' => $product->id,
                        'question' => $faqData['question'],
                        'answer' => $faqData['answer'],
                        'sort_order' => $index + 1,
                    ]);
                }
            }
        }

        return redirect()->route('admin.products.index')
            ->with('success', 'Product "' . $product->name . '" updated successfully!');
    }

    public function destroy(Product $product): RedirectResponse
    {
        $name = $product->name;

        if ($product->featured_image && file_exists(public_path($product->featured_image))) {
            @unlink(public_path($product->featured_image));
        }

        foreach ($product->images as $img) {
            if ($img->image && file_exists(public_path($img->image))) {
                @unlink(public_path($img->image));
            }
        }

        $product->delete();

        return redirect()->route('admin.products.index')
            ->with('success', 'Product "' . $name . '" deleted successfully!');
    }

    public function duplicate(Product $product): RedirectResponse
    {
        $replica = $product->replicate();
        $replica->name = $product->name . ' (Copy)';
        $replica->slug = Str::slug($replica->name) . '-' . time();
        $replica->status = 'draft';
        $replica->save();

        foreach ($product->faqs as $faq) {
            ProductFaq::create([
                'product_id' => $replica->id,
                'question' => $faq->question,
                'answer' => $faq->answer,
                'sort_order' => $faq->sort_order,
            ]);
        }

        return redirect()->route('admin.products.edit', $replica)
            ->with('success', 'Product duplicated as draft! You can now edit its details.');
    }

    public function preview(Product $product): View
    {
        $product->load(['category', 'images', 'faqs']);
        return view('admin.products.preview', compact('product'));
    }

    public function toggleStatus(Product $product, Request $request): RedirectResponse
    {
        $request->validate(['status' => 'required|in:published,draft,archived']);
        $product->update(['status' => $request->status]);

        return back()->with('success', 'Product status changed to ' . ucfirst($request->status));
    }
}
