<?php

namespace App\Http\Controllers;

use App\Models\CompanySetting;
use Illuminate\View\View;

class LegalController extends Controller
{
    public function privacy(): View
    {
        $company = CompanySetting::first();
        return view('pages.privacy', compact('company'));
    }

    public function terms(): View
    {
        $company = CompanySetting::first();
        return view('pages.terms', compact('company'));
    }
}
