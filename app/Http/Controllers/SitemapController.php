<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function sitemap(): Response
    {
        $products = Product::where('status', 'published')->latest()->get();

        $content = view('seo.sitemap', compact('products'))->render();

        return response($content, 200)
            ->header('Content-Type', 'text/xml; charset=utf-8')
            ->header('Cache-Control', 'public, max-age=3600, s-maxage=86400');
    }

    public function robots(): Response
    {
        $baseUrl = config('app.url', 'https://greendarmapharmaceuticals.com');
        $baseUrl = rtrim($baseUrl, '/');

        $content = "User-agent: *\n";
        $content .= "Disallow: /admin/\n";
        $content .= "Disallow: /admin*\n";
        $content .= "Allow: /\n";
        $content .= "Allow: /llms.txt\n\n";
        $content .= "Sitemap: " . $baseUrl . "/sitemap.xml\n";

        return response($content, 200)
            ->header('Content-Type', 'text/plain; charset=utf-8')
            ->header('Cache-Control', 'public, max-age=86400');
    }
}
