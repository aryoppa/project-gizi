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
        
        // buat folder jika belum ada
        if (!file_exists(public_path('img/dokumentasi'))) {
            mkdir(public_path('img/dokumentasi'), 0777, true);
        }
    
        $file = $request->file('image');

        // path fisik ke public_html
        $destination = rtrim($_SERVER['DOCUMENT_ROOT'], '/').'/img/dokumentasi';
    
        if (!file_exists($destination)) {
            mkdir($destination, 0755, true);
        }
    
        $filename = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());
    
        $file->move($destination, $filename);
    
        // path yang disimpan di DB — relatif ke public_html sehingga asset() bekerja
        $dbPath = 'img/dokumentasi/' . $filename;
    
        Dokumentasi::create([
            'image' => $dbPath,
            'title' => null,
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
