<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanySettingRequest;
use App\Models\CompanySetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CompanyController extends Controller
{
    public function index(): View
    {
        $settings = CompanySetting::firstOrCreate(
            ['id' => 1],
            ['company_name' => 'Green Darma Pharmaceuticals']
        );

        return view('admin.company.index', compact('settings'));
    }

    public function update(CompanySettingRequest $request): RedirectResponse
    {
        $settings = CompanySetting::firstOrCreate(['id' => 1]);
        $data = $request->validated();

        if ($request->hasFile('logo')) {
            if ($settings->logo && file_exists(public_path($settings->logo))) {
                @unlink(public_path($settings->logo));
            }
            $file = $request->file('logo');
            $filename = 'logo_' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('company', $filename, 'public');
            $data['logo'] = 'storage/' . $path;
        }

        if ($request->hasFile('favicon')) {
            if ($settings->favicon && file_exists(public_path($settings->favicon))) {
                @unlink(public_path($settings->favicon));
            }
            $file = $request->file('favicon');
            $filename = 'favicon_' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('company', $filename, 'public');
            $data['favicon'] = 'storage/' . $path;
        }

        $settings->update($data);

        return redirect()->route('admin.company.index')
            ->with('success', 'Company settings updated successfully!');
    }
}
