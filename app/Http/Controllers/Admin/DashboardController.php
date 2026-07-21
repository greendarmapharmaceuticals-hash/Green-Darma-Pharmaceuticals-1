<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ContactMessage;
use App\Models\Product;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $totalProducts = Product::count();
        $publishedProducts = Product::where('status', 'published')->count();
        $draftProducts = Product::where('status', 'draft')->count();
        $totalCategories = Category::count();
        $totalMessages = ContactMessage::count();
        $unreadMessages = ContactMessage::where('is_read', false)->count();

        $recentProducts = Product::with('category')
            ->latest()
            ->take(5)
            ->get();

        $recentMessages = ContactMessage::latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalProducts',
            'publishedProducts',
            'draftProducts',
            'totalCategories',
            'totalMessages',
            'unreadMessages',
            'recentProducts',
            'recentMessages'
        ));
    }
}
