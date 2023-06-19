<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use App\Models\Profile;
use App\Models\Tembusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use Pdf;

class SuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $username = auth()->user()->username;
        $userId = auth()->user()->id;
        $profile = Profile::where('user_id', $userId)->first();

        if (!$profile) {
            Profile::create([
                'nama' => $username,
                'foto' => "profile/default.png",
                'alamat' => "",
                "no_hp" => "",
                "nip" => "",
                "user_id" => $userId
            ]);
            return redirect('/dashboard/surat');
        }

        // $surat = Surat::where('nama_surat', 'like', '%' . request('search') . "%")
        //             ->orWhere('no_surat', 'like', "%" . request('search') . "%")->get();

        return view('dashboard.surat.index', [
            'title' => 'Dashboard',
            "surats" => Surat::filter(request(['search']))->get(),
            // "surats" => Surat::filter()->get(),
            // 'surats' => $surat,
            'profile' => $profile
        ]);
    }

    public function cetak_surat(Surat $surat)
    {
        $tembusan = Tembusan::where('no_surat', $surat->no_surat)->get();
        $pdf = Pdf::loadView("dashboard.surat.cetak", [
            'surat' => $surat,
            'tembusan' => $tembusan
        ]);
        return $pdf->stream('cetak_surat');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userId = auth()->user()->id;
        $profile = Profile::where('user_id', $userId)->first();

        return view('dashboard.surat.create', [
            "title" => "Tambah Surat",
            'profile' => $profile
        ]);
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
            "head" => "required|max:255",
            "alamat" => "required|max:255",
            "nama_surat" => "required|max:255",
            "no_surat" => "required|max:255",
            "tempat" => "required|max:255",
            "penanggung_jawab" => "required|max:255",
            "nip" => "required|max:255",
            "tgl_surat" => "required|max:255",
            "background" => "required",
            "logo" => "required|image|file|max:5126",
            "ttd" => "required|image|file|max:5126",
            "konten" => "required"
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['logo'] = $request->file('logo')->store('logo');
        $validatedData['ttd'] = $request->file('ttd')->store('ttd');

        Surat::create($validatedData);
        Alert::success('Surat Berhasil ditambahkan', '');
        return redirect('/dashboard/surat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function show(Surat $surat)
    {
        $userId = auth()->user()->id;
        $profile = Profile::where('user_id', $userId)->first();
        $tembusan = Tembusan::where('no_surat', $surat->no_surat)->get();

        return view('dashboard.surat.detail', [
            "title" => "Detail Surat",
            "surat" => $surat,
            'profile' => $profile,
            'tembusan' => $tembusan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function edit(Surat $surat)
    {
        $userId = auth()->user()->id;
        $profile = Profile::where('user_id', $userId)->first();

        return view('dashboard.surat.edit', [
            'title' => 'Edit Surat',
            'surat' => $surat,
            'profile' => $profile
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Surat $surat)
    {
        $validatedData = $request->validate([
            "head" => "required|max:255",
            "alamat" => "required|max:255",
            "nama_surat" => "required|max:255",
            "no_surat" => "required|max:255",
            "tempat" => "required|max:255",
            "penanggung_jawab" => "required|max:255",
            "nip" => "required|max:255",
            "tgl_surat" => "required|max:255",
            "background" => "required",
            "logo" => "image|file|max:5126",
            "ttd" => "image|file|max:5126",
            "konten" => "required|max:255"
        ]);

        // $validatedData['user_id'] = auth()->user()->id;
        $validatedData['user_id'] = $surat->user_id;

        if ($request->file('logo')) {
            Storage::delete($request->oldLogo);
            $validatedData['logo'] = $request->file('logo')->store('logo');
        }
        if ($request->file('ttd')) {
            Storage::delete($request->oldTtd);
            $validatedData['ttd'] = $request->file('ttd')->store('ttd');
        }

        Surat::where('id', $surat->id)
            ->update($validatedData);

        Alert::success('Surat Berhasil diubah', '');

        return redirect('/dashboard/surat')->with('success', "Surat berhasil diubah.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Surat $surat)
    {
        Storage::delete($surat->logo);
        Storage::delete($surat->ttd);

        Surat::destroy($surat->id);
        Alert::success('Surat Berhasil dihapus', '');
        return redirect('/dashboard/surat')->with('success', "Surat berhasil dihapus.");
    }
}
