<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductImage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\View\View;

class MediaController extends Controller
{
    public function index(): View
    {
        $galleryImages = ProductImage::with('product')->latest()->paginate(24);
        return view('admin.media.index', compact('galleryImages'));
    }

    public function upload(Request $request): RedirectResponse
    {
        $request->validate([
            'files' => 'required|array',
            'files.*' => 'image|mimes:jpeg,jpg,png,webp|max:5120',
            'product_id' => 'nullable|exists:products,id',
        ]);

        $uploadedCount = 0;
        foreach ($request->file('files') as $file) {
            $filename = 'media_' . time() . '_' . Str::random(6) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('products', $filename, 'public');
            
            if ($request->filled('product_id')) {
                ProductImage::create([
                    'product_id' => $request->product_id,
                    'image' => 'storage/' . $path,
                    'alt_text' => 'Product Media Upload',
                ]);
            }
            $uploadedCount++;
        }

        return back()->with('success', $uploadedCount . ' images uploaded successfully!');
    }

    public function destroy(ProductImage $image): RedirectResponse
    {
        if (file_exists(public_path($image->image))) {
            @unlink(public_path($image->image));
        }
        $image->delete();

        return back()->with('success', 'Image removed from media library.');
    }
}
