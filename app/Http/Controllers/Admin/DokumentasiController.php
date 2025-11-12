<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dokumentasi;
use Illuminate\Support\Facades\Storage;

class DokumentasiController extends Controller
{
    public function index()
    {
        // pagination recommended
        $dokumentasis = Dokumentasi::latest()->paginate(12);

        // dd($dokumentasis->toArray());
        // echo $dokumentasis;
        return view('admin_dokumentasi', compact('dokumentasis'));
    }

    public function create()
    {
        return view('tambah_dokumentasi');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,jpg,png|max:4096',
        ]);

        $path = $request->file('image')->store('img/dokumentasi', 'public');

        // save to DB
        Dokumentasi::create([
            'image' => $path,
            'title' => null, // optional or static title
        ]);

        return redirect()->route('admin.dokumentasi.index')
            ->with('success', 'Foto dokumentasi berhasil diupload!');
    }


    public function destroy(Dokumentasi $dokumentasi)
    {
        // hapus file jika ada
        if (Storage::disk('public')->exists($dokumentasi->image)) {
            Storage::disk('public')->delete($dokumentasi->image);
        }

        $dokumentasi->delete();

        return back()->with('success', 'Foto dokumentasi berhasil dihapus!');
    }
}
