<?php

namespace App\Http\Controllers;

use App\Models\CompanySetting;
use Illuminate\View\View;

class AboutController extends Controller
{
    public function index(): View
    {
        $company = null;
        try {
            if (\Illuminate\Support\Facades\Schema::hasTable('company_settings')) {
                $company = CompanySetting::first();
            }
        } catch (\Throwable $e) {}
        return view('about', compact('company'));
    }
}
