<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Edukasi;
use Illuminate\Support\Facades\Storage;

class EdukasiController extends Controller
{
    public function index()
    {
        $edukasis = Edukasi::latest()->paginate(12);
        return view('admin_edukasi', compact('edukasis')); // admin list view or public list
    }

    public function home_index()
    {
        $edukasis = Edukasi::latest()->paginate(12);
        return view('edukasi', compact('edukasis')); // admin list view or public list
    }
    

    public function create()
    {
        return view('tambah_edukasi');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,jpg,png|max:4096',
            'video_link' => 'nullable|string',
            'description' => 'nullable|string',
            'published_at' => 'nullable|date',
        ]);

        // dd($request->all());
        $path = null;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('img/edukasi', 'public');
        }

        Edukasi::create([
            'title' => $request->title,
            'image' => $path,
            'video_link' => $request->video_link,
            'description' => $request->description,
            'published_at' => $request->published_at,
        ]);

        return redirect()->route('admin.edukasi.index')->with('success', 'Edukasi berhasil ditambahkan!');
    }

    public function show(Edukasi $edukasi)
    {
        // dd($edukasi);
        $edukasis = Edukasi::latest()->paginate(12);
        $edukasis->getCollection()->transform(function ($item) {
            $item->image = $item->image 
                ? asset('storage/' . ltrim($item->image, '/')) 
                : asset('img/placeholder.png');
            $item->link = $item->id;
            return $item;
        });
        return view('detail_edukasi', compact('edukasi', 'edukasis'));
    }

    public function edit(Edukasi $edukasi)
    {
        return view('edit_edukasi', compact('edukasi')); // reuse form for edit
    }

    public function update(Request $request, Edukasi $edukasi)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,jpg,png|max:4096',
            'video_link' => 'nullable|string',
            'description' => 'nullable|string'
        ]);

        // dd($request->all());

        if ($request->hasFile('image')) {
            // delete old image if exists
            if ($edukasi->image && Storage::disk('public')->exists($edukasi->image)) {
                Storage::disk('public')->delete($edukasi->image);
            }
            $edukasi->image = $request->file('image')->store('img/edukasi', 'public');
        }

        
        $edukasi->title = $request->title;
        $edukasi->video_link = $request->video_link;
        $edukasi->description = $request->description;
        $edukasi->published_at = $request->published_at;
        $edukasi->save();

        return redirect()->route('admin.edukasi.index')->with('success', 'Edukasi berhasil diperbarui!');
    }

    public function destroy(Edukasi $edukasi)
    {
        if ($edukasi->image && Storage::disk('public')->exists($edukasi->image)) {
            Storage::disk('public')->delete($edukasi->image);
        }
        $edukasi->delete();

        return back()->with('success', 'Edukasi berhasil dihapus!');
    }
}
