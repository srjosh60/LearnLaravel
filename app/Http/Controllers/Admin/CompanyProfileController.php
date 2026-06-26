<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CompanyProfileController extends Controller
{
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

    private function uploadToCloudinary($file): string
    {
        $cloudName = config('services.cloudinary.cloud_name');
        $apiKey    = config('services.cloudinary.api_key');
        $apiSecret = config('services.cloudinary.api_secret');

        $timestamp = time();
        $signature = sha1("timestamp={$timestamp}{$apiSecret}");

        $response = Http::attach(
            'file',
            file_get_contents($file->getRealPath()),
            $file->getClientOriginalName()
        )->post("https://api.cloudinary.com/v1_1/{$cloudName}/image/upload", [
            'api_key'   => $apiKey,
            'timestamp' => $timestamp,
            'signature' => $signature,
        ]);

        return $response->json('secure_url');
    }

    private function deleteFromCloudinary(string $url): void
    {
        $cloudName = config('services.cloudinary.cloud_name');
        $apiKey    = config('services.cloudinary.api_key');
        $apiSecret = config('services.cloudinary.api_secret');

        // Extract public_id from URL: .../upload/v123456/{public_id}.ext
        if (!preg_match('/\/upload\/(?:v\d+\/)?(.+)\.\w+$/', $url, $matches)) {
            return;
        }
        $publicId  = $matches[1];
        $timestamp = time();
        $signature = sha1("public_id={$publicId}&timestamp={$timestamp}{$apiSecret}");

        Http::post("https://api.cloudinary.com/v1_1/{$cloudName}/image/destroy", [
            'public_id' => $publicId,
            'api_key'   => $apiKey,
            'timestamp' => $timestamp,
            'signature' => $signature,
        ]);
    }
}