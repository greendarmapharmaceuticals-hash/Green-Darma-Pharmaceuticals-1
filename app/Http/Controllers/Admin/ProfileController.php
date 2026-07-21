<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function index(): View
    {
        $admin = Auth::guard('admin')->user();
        return view('admin.profile.index', compact('admin'));
    }

    public function updateProfile(Request $request): RedirectResponse
    {
        $admin = Auth::guard('admin')->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:admins,email,' . $admin->id,
            'profile_photo' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048',
        ]);

        $data = $request->only('name', 'email');

        if ($request->hasFile('profile_photo')) {
            if ($admin->profile_photo && file_exists(public_path($admin->profile_photo))) {
                @unlink(public_path($admin->profile_photo));
            }
            $file = $request->file('profile_photo');
            $filename = 'admin_' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('company', $filename, 'public');
            $data['profile_photo'] = 'storage/' . $path;
        }

        $admin->update($data);

        return back()->with('success', 'Profile updated successfully!');
    }

    public function updatePassword(Request $request): RedirectResponse
    {
        $admin = Auth::guard('admin')->user();

        $request->validate([
            'current_password' => 'required|string',
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        if (!Hash::check($request->current_password, $admin->password)) {
            return back()->withErrors(['current_password' => 'Current password does not match our records.']);
        }

        $admin->update(['password' => Hash::make($request->password)]);

        return back()->with('success', 'Password updated successfully!');
    }
}
