<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Profile;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RoleController extends Controller
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

        $title = 'Delete User!';
        confirmDelete($title);

        return view("dashboard.role.index", [
            'title' => "Role",
            'role' => Role::all(),
            'profile' => $profile,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("dashboard.role.create", [
            'title' => "Tambah Role"
        ]);
    }

    public function getRolebyid(Request $request)
    {
        $id = $request->id;
        $roles = Role::select('*')->where('id', $id)->get();

        return response()->json($roles);
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
            "keterangan" => "required|max:255"
        ]);

        Role::create($validatedData);
        Alert::success('Role Berhasil ditambahkan', '');

        return redirect('/dashboard/role')->with('success', "Role berhasil ditambahkan.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $validatedData = $request->validate([
            "keterangan" => "required|max:255",
        ]);

        Role::where('id', $role->id)
            ->update($validatedData);
        Alert::success('Role Berhasil diubah', '');

        return redirect('/dashboard/role')->with('success', "Role berhasil diubah.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        Role::destroy($role->id);
        Alert::success('Role Berhasil dihapus', '');
        return redirect('/dashboard/role')->with('success', "Role berhasil dihapus.");
    }
}
