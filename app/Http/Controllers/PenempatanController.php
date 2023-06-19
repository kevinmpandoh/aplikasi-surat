<?php

namespace App\Http\Controllers;

use App\Models\Penempatan;
use App\Models\Profile;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PenempatanController extends Controller
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

        return view("dashboard.penempatan.index", [
            'title' => "Penempatan",
            'penempatan' => Penempatan::all(),
            'profile' => $profile,
        ]);
    }

    public function getPenempatanbyid(Request $request)
    {
        $id = $request->id;
        $roles = Penempatan::select('*')->where('id', $id)->get();

        return response()->json($roles);
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
            "keterangan" => "required|max:255"
        ]);

        Penempatan::create($validatedData);
        Alert::success('Penempatan Berhasil ditambahkan', '');

        return redirect('/dashboard/penempatan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penempatan  $penempatan
     * @return \Illuminate\Http\Response
     */
    public function show(Penempatan $penempatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penempatan  $penempatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Penempatan $penempatan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penempatan  $penempatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penempatan $penempatan)
    {
        $validatedData = $request->validate([
            "keterangan" => "required|max:255",
        ]);

        Penempatan::where('id', $penempatan->id)
            ->update($validatedData);
        Alert::success('Penempatan Berhasil diubah', '');

        return redirect('/dashboard/penempatan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penempatan  $penempatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penempatan $penempatan)
    {
        Penempatan::destroy($penempatan->id);
        Alert::success('Penempatan Berhasil dihapus', '');
        return redirect('/dashboard/penempatan');
    }
}
