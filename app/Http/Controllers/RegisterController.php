<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use App\Models\Penempatan;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register', [
            'title' => "Daftar",
            "roles" => Role::all(),
            "penempatan" => Penempatan::all()
        ]);
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'username' => 'required|min:3|max:255|unique:users',
            'password' => 'required|min:3|max:255|same:password2',
            'penempatan_id' => "required",
            'role_id' => "required",
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        $validatedData['is_active'] = 1;

        User::create($validatedData);

        return redirect('/')->with('success', "Pendaftaran berhasil! silahkan login.");
    }
}
