<?php

namespace App\Http\Controllers;

use App\Models\CompanySetting;
use Illuminate\View\View;

class LegalController extends Controller
{
    public function privacy(): View
    {
        $company = null;
        try {
            if (\Illuminate\Support\Facades\Schema::hasTable('company_settings')) {
                $company = CompanySetting::first();
            }
        } catch (\Throwable $e) {}
        return view('pages.privacy', compact('company'));
    }

    public function terms(): View
    {
        $company = null;
        try {
            if (\Illuminate\Support\Facades\Schema::hasTable('company_settings')) {
                $company = CompanySetting::first();
            }
        } catch (\Throwable $e) {}
        return view('pages.terms', compact('company'));
    }
}
