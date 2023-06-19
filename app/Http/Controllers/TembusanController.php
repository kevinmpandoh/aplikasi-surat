<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Surat;
use App\Models\Tembusan;
use App\Models\Profile;
use RealRashid\SweetAlert\Facades\Alert;
// use RealRashid\SweetAlert\SweetAlertServiceProvider\;

class TembusanController extends Controller
{
    public function index()
    {
        $userId = auth()->user()->id;
        $profile = Profile::where('user_id', $userId)->first();

        $tembusan = DB::table('tembusan')
            ->join('surat', 'surat.no_surat', '=', 'tembusan.no_surat')
            ->select('tembusan.*', 'surat.nama_surat')
            ->get();

        $title = 'Apakah anda yakin ingin menghapusnya?';
        confirmDelete($title);

        return view('dashboard.tembusan.index', [
            'title' => 'Tembusan',
            'tembusan' => $tembusan,
            'surat' => Surat::all(),
            'profile' => $profile,
        ]);
    }

    public function getTembusanbyid(Request $request)
    {
        $id = $request->id;
        $roles = Tembusan::select('*')->where('id', $id)->get();

        return response()->json($roles);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "no_surat" => "required|max:255",
            "keterangan" => "required|max:255"
        ]);

        Tembusan::create($validatedData);
        Alert::success('Tembusan Berhasil ditambahkan', '');

        return redirect('/dashboard/tembusan')->with("success", "Tembusan berhasil ditambahkan");
    }

    public function update(Request $request, Tembusan $tembusan)
    {
        $validatedData = $request->validate([
            "no_surat" => "required|max:255",
            "keterangan" => "required|max:255"
        ]);

        Tembusan::where('id', $tembusan->id)
            ->update($validatedData);
        Alert::success('Tembusan Berhasil diubah', '');

        return redirect('/dashboard/tembusan')->with("success", "Tembusan berhasil diubah");
    }

    public function destroy(Tembusan $tembusan)
    {
        Tembusan::destroy($tembusan->id);
        Alert::success('Tembusan Berhasil dihapus', '');
        return redirect('/dashboard/tembusan')->with("success", "Tembusan berhasil dihapus");
    }
}
