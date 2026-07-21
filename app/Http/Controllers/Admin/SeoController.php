<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SeoSetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class SeoController extends Controller
{
    public function index(): View
    {
        $pages = ['home', 'about', 'products', 'contact'];
        $seoSettings = [];

        foreach ($pages as $page) {
            $seoSettings[$page] = SeoSetting::firstOrCreate(
                ['page' => $page],
                [
                    'meta_title' => ucfirst($page) . ' | Green Darma Pharmaceuticals',
                    'meta_description' => 'Official ' . $page . ' page of Green Darma Pharmaceuticals.',
                ]
            );
        }

        return view('admin.seo.index', compact('seoSettings'));
    }

    public function update(Request $request): RedirectResponse
    {
        $request->validate([
            'pages' => 'required|array',
            'pages.*.meta_title' => 'nullable|string|max:255',
            'pages.*.meta_description' => 'nullable|string',
            'pages.*.keywords' => 'nullable|string',
            'pages.*.canonical_url' => 'nullable|url',
        ]);

        foreach ($request->input('pages') as $pageKey => $seoData) {
            $seoSetting = SeoSetting::firstOrCreate(['page' => $pageKey]);
            
            if ($request->hasFile("pages.{$pageKey}.og_image")) {
                if ($seoSetting->og_image && file_exists(public_path($seoSetting->og_image))) {
                    @unlink(public_path($seoSetting->og_image));
                }
                $file = $request->file("pages.{$pageKey}.og_image");
                $filename = 'og_' . $pageKey . '_' . time() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('seo', $filename, 'public');
                $seoData['og_image'] = 'storage/' . $path;
            }

            $seoSetting->update($seoData);
        }

        return redirect()->route('admin.seo.index')
            ->with('success', 'SEO settings updated successfully!');
    }
}
