<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Resep;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class ResepController extends Controller
{
    public function index()
    {
        $reseps = Resep::latest()->paginate(12);
        return view('admin_resep', compact('reseps'));
    }

    public function create()
    {
        return view('tambah_resep');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'image'       => 'nullable|image|mimes:jpeg,jpg,png|max:4096',
            'portion'     => 'nullable|string',
            'energy'      => 'nullable|string',
            'protein'     => 'nullable|string',
            'fat'         => 'nullable|string',
            'carbs'       => 'nullable|string',
            'ingridients' => 'required|string',
            'tools'       => 'required|string',
            'how_to'      => 'required|string',
        ]);

        try {
            // store image if provided
            $path = null;
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $path = $request->file('image')->store('img/reseps', 'public');
            }

            // normalize units
            $energy  = $this->addUnitIfMissing($request->energy, 'Kkal');
            $protein = $this->addUnitIfMissing($request->protein, 'g');
            $fat     = $this->addUnitIfMissing($request->fat, 'g');
            $carbs   = $this->addUnitIfMissing($request->carbs, 'g');

            // create record
            Resep::create([
                'name'        => $request->name,
                'image'       => $path,
                'portion'     => $request->portion,
                'energy'      => $energy,
                'protein'     => $protein,
                'fat'         => $fat,
                'carbs'       => $carbs,
                'ingridients' => $request->ingridients,
                'tools'       => $request->tools,
                'how_to'      => $request->how_to,
            ]);

            return redirect()->route('admin.resep.index')->with('success', 'Resep berhasil ditambahkan!');
        } catch (\Exception $e) {
            Log::error('Resep store error: '.$e->getMessage(), ['trace' => $e->getTraceAsString()]);
            return back()->withErrors(['general' => 'Terjadi kesalahan saat menyimpan.'])->withInput();
        }
    }

    public function show(Resep $resep)
    {
        return view('detail_resep', compact('resep'));
    }

    public function edit(Resep $resep)
    {
        return view('edit_resep', compact('resep'));
    }

    public function update(Request $request, Resep $resep)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'image'       => 'nullable|image|mimes:jpeg,jpg,png|max:4096',
            'portion'     => 'nullable|string',
            'energy'      => 'nullable|string',
            'protein'     => 'nullable|string',
            'fat'         => 'nullable|string',
            'carbs'       => 'nullable|string',
            'ingridients' => 'required|string',
            'tools'       => 'required|string',
            'how_to'      => 'required|string',
        ]);

        try {
            // handle image replacement
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                // delete old file if exists
                if ($resep->image && Storage::disk('public')->exists($resep->image)) {
                    Storage::disk('public')->delete($resep->image);
                }
                $resep->image = $request->file('image')->store('img/reseps', 'public');
            }

            // normalize units
            $resep->energy  = $this->addUnitIfMissing($request->energy, 'Kkal');
            $resep->protein = $this->addUnitIfMissing($request->protein, 'g');
            $resep->fat     = $this->addUnitIfMissing($request->fat, 'g');
            $resep->carbs   = $this->addUnitIfMissing($request->carbs, 'g');

            // update other fields
            $resep->name        = $request->name;
            $resep->portion     = $request->portion;
            $resep->ingridients = $request->ingridients;
            $resep->tools       = $request->tools;
            $resep->how_to      = $request->how_to;

            $resep->save();

            return redirect()->route('admin.resep.index')->with('success', 'Resep berhasil diperbarui!');
        } catch (\Exception $e) {
            Log::error('Resep update error: '.$e->getMessage(), ['trace' => $e->getTraceAsString()]);
            return back()->withErrors(['general' => 'Terjadi kesalahan saat memperbarui.'])->withInput();
        }
    }

    public function destroy(Resep $resep)
    {
        try {
            if ($resep->image && Storage::disk('public')->exists($resep->image)) {
                Storage::disk('public')->delete($resep->image);
            }
            $resep->delete();

            return back()->with('success', 'Resep berhasil dihapus!');
        } catch (\Exception $e) {
            Log::error('Resep delete error: '.$e->getMessage(), ['trace' => $e->getTraceAsString()]);
            return back()->withErrors(['general' => 'Terjadi kesalahan saat menghapus.']);
        }
    }

    /**
     * Helper: add unit if missing (case-insensitive)
     * returns null for empty input
     */
    private function addUnitIfMissing(?string $value, string $unit): ?string
    {
        $value = trim((string)$value);
        if ($value === '') return null;

        // If already ends with unit (e.g. "12 g" or "12g" or "100 Kkal"), keep as is
        // allow optional space before unit; case-insensitive
        $pattern = '/\s*' . preg_quote($unit, '/') . '$/i';
        if (preg_match($pattern, $value)) {
            return $value;
        }

        return $value . ' ' . $unit;
    }
}
    