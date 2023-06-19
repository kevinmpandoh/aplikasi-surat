<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;


class ProfileController extends Controller
{
    public function show(Profile $profile)
    {
        return view('dashboard.profile.detail', [
            'title' => " My Profile",
            "profile" => $profile->load('user')
        ]);
    }

    public function edit(Profile $profile)
    {
        return view('dashboard.profile.edit', [
            'title' => 'Edit Profile',
            'profile' => $profile
        ]);
    }

    public function update(Request $request, Profile $profile)
    {
        $validatedData = $request->validate([
            "nama" => "required|max:255",
            "no_hp" => "required|max:255",
            "nip" => "required|max:255",
            "alamat" => "required|max:255",
            "foto" => "image|file|max:5126"
        ]);

        $validatedData['user_id'] = $profile->user_id;
        if ($request->file('foto')) {
            if ($request->oldFoto !== "profile/default.png") {
                Storage::delete($request->oldFoto);
            }
            $validatedData['foto'] = $request->file('foto')->store('profile');
        }

        Profile::where('id', $profile->id)
            ->update($validatedData);

        Alert::success('Profile Berhasil diubah', '');

        return redirect('/dashboard/profile/' . $profile->user_id);
    }
}
