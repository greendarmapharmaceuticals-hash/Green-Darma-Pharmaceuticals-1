<?php

namespace App\Http\Controllers;

use App\Models\CompanySetting;
use Illuminate\View\View;

class AboutController extends Controller
{
    public function index(): View
    {
        $company = CompanySetting::first();
        return view('about', compact('company'));
    }
}
