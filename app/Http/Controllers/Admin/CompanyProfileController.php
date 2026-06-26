<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\Traits\CloudinaryUpload;
use App\Models\CompanyProfile;
use Illuminate\Http\Request;

class CompanyProfileController extends Controller
{
    use CloudinaryUpload;
    public function index()
    {
        $profiles = CompanyProfile::latest()->get();
        return view('admin.profile.index', compact('profiles'));
    }

    public function create()
    {
        return view('admin.profile.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'company_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'vision' => 'nullable|string',
            'mission' => 'nullable|string',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:30',
            'email' => 'nullable|email|max:255',
            'instagram' => 'nullable|string|max:100',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ], [
            'company_name.required' => 'Nama perusahaan wajib diisi.',
            'email.email' => 'Format email tidak valid.',
        ]);

        if ($request->hasFile('logo')) {
            $validated['logo'] = $this->uploadToCloudinary($request->file('logo'));
        }

        CompanyProfile::create($validated);

        return redirect()->route('admin.profile.index')->with('success', 'Profil perusahaan berhasil ditambahkan.');
    }

    public function edit(CompanyProfile $profile)
    {
        return view('admin.profile.edit', compact('profile'));
    }

    public function update(Request $request, CompanyProfile $profile)
    {
        $validated = $request->validate([
            'company_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'vision' => 'nullable|string',
            'mission' => 'nullable|string',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:30',
            'email' => 'nullable|email|max:255',
            'instagram' => 'nullable|string|max:100',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ], [
            'company_name.required' => 'Nama perusahaan wajib diisi.',
            'email.email' => 'Format email tidak valid.',
        ]);

        if ($request->hasFile('logo')) {
            if ($profile->logo && str_starts_with($profile->logo, 'http')) {
                $this->deleteFromCloudinary($profile->logo);
            }
            $validated['logo'] = $this->uploadToCloudinary($request->file('logo'));
        }

        $profile->update($validated);

        return redirect()->route('admin.profile.index')->with('success', 'Profil perusahaan berhasil diperbarui.');
    }

    public function destroy(CompanyProfile $profile)
    {
        if ($profile->logo && str_starts_with($profile->logo, 'http')) {
            $this->deleteFromCloudinary($profile->logo);
        }
        $profile->delete();

        return redirect()->route('admin.profile.index')->with('success', 'Profil perusahaan berhasil dihapus.');
    }

}