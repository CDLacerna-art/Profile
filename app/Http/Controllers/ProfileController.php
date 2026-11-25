<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    // Public page (the professor's layout)
    public function show()
    {
        $profile = Profile::firstOrFail();
        return view('profile.show', compact('profile'));
    }

    // Edit form
    public function edit()
    {
        $profile = Profile::firstOrFail();
        return view('profile.edit', compact('profile'));
    }

    // Save changes
    public function update(Request $request)
    {
        $profile = Profile::firstOrFail();

        $data = $request->validate([
            'full_name'       => 'required|string|max:100',
            'course'          => 'required|string|max:100',
            'year_section'    => 'required|string|max:50',
            'motto'           => 'required|string|max:500',
            'bible_verse'     => 'required|string|max:1000',
            'bible_verse_ref' => 'nullable|string|max:100',
            'facebook_url'    => 'nullable|url|max:255',
            'email'           => 'nullable|email|max:255',
            'github_url'      => 'nullable|url|max:255',
            'gcash_name'      => 'nullable|string|max:100',
            'gcash_number'    => 'nullable|string|max:20',
            'photo'           => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'gcash_qr'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Profile photo upload (replace the old file)
        if ($request->hasFile('photo')) {
            if ($profile->photo_path) {
                Storage::disk('public')->delete($profile->photo_path);
            }
            $data['photo_path'] = $request->file('photo')->store('profile', 'public');
        }

        // GCash QR upload (replace the old file)
        if ($request->hasFile('gcash_qr')) {
            if ($profile->gcash_qr_path) {
                Storage::disk('public')->delete($profile->gcash_qr_path);
            }
            $data['gcash_qr_path'] = $request->file('gcash_qr')->store('qr', 'public');
        }

        unset($data['photo'], $data['gcash_qr']); // not database columns

        $profile->update($data);

        return redirect()->route('profile.show')->with('success', 'Profile updated.');
    }
}
