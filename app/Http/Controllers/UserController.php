<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\Profile;
use App\Models\Penempatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $userId = auth()->user()->id;
        $profile = Profile::where('user_id', $userId)->first();


        return view("dashboard.user.index", [
            "title" => "User",
            "users" => User::with(['role', 'penempatan'])->get(),
            'role' => Role::all(),
            'penempatan' => Penempatan::all(),
            'profile' => $profile
        ]);
    }

    public function getUserbyid(Request $request)
    {
        $id = $request->id;
        $users = User::select('*')->where('id', $id)->get();

        return response()->json($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|min:3|max:255|unique:users',
            "password" => "required|max:255",
            "penempatan_id" => "required",
            "role_id" => "required",
        ]);

        if (!$request->is_active) {
            $validatedData['is_active'] = 0;
        } else {
            $validatedData['is_active'] = 1;
        }

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);
        Alert::success('User Berhasil tambah', '');

        return redirect('/dashboard/user')->with('success', "User berhasil ditambahkan.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'username' => 'required|min:3|max:255',
            "penempatan_id" => "required",
            "role_id" => "required",
        ]);

        if (!$request->is_active) {
            $validatedData['is_active'] = 0;
        } else {
            $validatedData['is_active'] = 1;
        }

        $validatedData['password'] = $user->password;

        User::where('id', $user->id)
            ->update($validatedData);

        Alert::success('User Berhasil diubah', '');
        return redirect('/dashboard/user')->with('success', "User berhasil diubah.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);
        Alert::success('User Berhasil dihapus', '');
        return redirect('/dashboard/user')->with('success', "User berhasil dihapus.");
    }
}
