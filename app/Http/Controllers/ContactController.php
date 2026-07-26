<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactMessageRequest;
use App\Models\CompanySetting;
use App\Models\ContactMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function index(): View
    {
        $company = null;
        try {
            if (\Illuminate\Support\Facades\Schema::hasTable('company_settings')) {
                $company = CompanySetting::first();
            }
        } catch (\Throwable $e) {}
        return view('contact', compact('company'));
    }

    public function store(ContactMessageRequest $request): RedirectResponse
    {
        ContactMessage::create($request->validated());

        return back()->with('success', 'Thank you for reaching out to Green Darma Pharmaceuticals! Your message has been sent successfully. Our medical team will respond shortly.');
    }
}
