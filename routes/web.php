<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\DokumentasiController;

Route::get('/', function () {
    return view('home');
});

Route::get('/tentang_kami', function () {
    return view('tentang_kami');
});

Route::get('/dokumentasi', function () {
    return view('dokumentasi');
});

Route::get('/edukasi', function () {
    return view('edukasi');
});

Route::get('/edukasi/{id}', function ($id) {
    return view('detail_edukasi');
});

Route::get('/resep', function () {
    return view('resep');
});

Route::get('/resep/{id}', function ($id) {
    return view('detail_resep');
});

Route::get('/mealplan', function () {
    return view('mealplan');
});

Route::get('/admin_login', function () {
    return view('admin_login');
});

// Public routes — dihitung oleh middleware
Route::middleware(['web', 'count.visitor'])->group(function () {
    Route::get('/', function () { return view('home'); });

    Route::get('/tentang_kami', function () { return view('tentang_kami'); });

    Route::get('/dokumentasi', function () { return view('dokumentasi'); });

    Route::get('/edukasi', function () { return view('edukasi'); });
    Route::get('/edukasi/{id}', function ($id) { return view('detail_edukasi'); });

    Route::get('/resep', function () { return view('resep'); });
    Route::get('/resep/{id}', function ($id) { return view('detail_resep'); });

    Route::get('/mealplan', function () { return view('mealplan'); });

    // public admin login view (boleh tetap di publik)
    Route::get('/admin_login', function () { return view('admin_login'); });
});


// Route login admin
Route::get('/admin/login', function () {
    return view('admin_login');
})->name('admin.login');

Route::post('/admin/login', function (Request $request) {
    $username = $request->input('username');
    $password = $request->input('password');

    if ($username === 'admin' && $password === 'admin123') {
        session(['admin_logged_in' => true]);
        return redirect()->route('admin.dashboard');
    }

    return back()->withErrors(['login' => 'Username atau password salah']);
})->name('admin.login.submit');


// Admin Dashboard Routes (dengan middleware check session)
Route::middleware(['web'])->prefix('admin')->group(function () {

    Route::get('/dokumentasi', [DokumentasiController::class, 'index'])->name('admin.dokumentasi.index');
    Route::get('/dokumentasi/create', [DokumentasiController::class, 'create'])->name('admin.dokumentasi.create');
    Route::post('/dokumentasi/store', [DokumentasiController::class, 'store'])->name('admin.dokumentasi.store');
    Route::delete('/dokumentasi/{dokumentasi}', [DokumentasiController::class, 'destroy'])->name('admin.dokumentasi.destroy');
    
    // // Dokumentasi Routes
    // Route::get('/dokumentasi', function () {
    //     if (!session('admin_logged_in')) {
    //         return redirect()->route('admin.login');
    //     }
    //     return view('admin_dokumentasi');
    // })->name('admin.dokumentasi.index');

    // Dashboard
    Route::get('/dashboard', function () {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        // Ambil statistik visits untuk ditampilkan di dashboard
        $totalVisits = \App\Models\Visit::count();

        $topPages = \App\Models\Visit::selectRaw('path, count(*) as hits')
            ->groupBy('path')
            ->orderByDesc('hits')
            ->limit(10)
            ->get();

        $visitsLast7 = \App\Models\Visit::selectRaw('DATE(visited_at) as date, count(*) as hits')
            ->where('visited_at', '>=', now()->subDays(6)->startOfDay())
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        return view('admin_dashboard', compact('totalVisits', 'topPages', 'visitsLast7'));
    })->name('admin.dashboard');

    


    Route::get('/dokumentasi/create', function () {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        return view('tambah_dokumentasi');
    })->name('admin.dokumentasi.create');

    // Route::post('/dokumentasi/store', function (Request $request) {
    //     if (!session('admin_logged_in')) {
    //         return redirect()->route('admin.login');
    //     }

    //     // Validate
    //     $request->validate([
    //         'image' => 'required|image|mimes:jpeg,jpg,png|max:2048'
    //     ]);

    //     // Handle file upload
    //     if ($request->hasFile('image')) {
    //         $image = $request->file('image');
    //         $imageName = time() . '.' . $image->getClientOriginalExtension();
    //         $image->move(public_path('img/dokumentasi'), $imageName);

    //         // Save to database here (if you have a model)
    //         // Dokumentasi::create([
    //         //     'image' => 'img/dokumentasi/' . $imageName,
    //         // ]);
    //     }

    //     return redirect()->route('admin.dokumentasi.index')
    //         ->with('success', 'Dokumentasi telah ditambahkan!');
    // })->name('admin.dokumentasi.store');

    Route::get('/dokumentasi/{id}', function ($id) {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        return view('admin_dokumentasi_detail');
    })->name('admin.dokumentasi.show');

    Route::get('/dokumentasi/{id}/edit', function ($id) {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        return view('admin_dokumentasi_edit');
    })->name('admin.dokumentasi.edit');

    Route::delete('/dokumentasi/{id}', function ($id) {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        // Handle delete logic here
        // $dokumentasi = Dokumentasi::findOrFail($id);
        // if (file_exists(public_path($dokumentasi->image))) {
        //     unlink(public_path($dokumentasi->image));
        // }
        // $dokumentasi->delete();

        return redirect()->route('admin.dokumentasi.index')
            ->with('success', 'Dokumentasi berhasil dihapus!');
    })->name('admin.dokumentasi.destroy');

    // Edukasi Routes
    Route::get('/edukasi', function () {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        return view('admin_edukasi');
    })->name('admin.edukasi.index');

    Route::get('/edukasi/create', function () {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        return view('admin_edukasi_create');
    })->name('admin.edukasi.create');

    Route::post('/edukasi/store', function (Request $request) {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        // Validate
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'required|image|mimes:jpeg,jpg,png|max:2048'
        ]);

        // Handle file upload
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('img/edukasi'), $imageName);

            // Save to database here
            // Edukasi::create([
            //     'judul' => $request->judul,
            //     'deskripsi' => $request->deskripsi,
            //     'gambar' => 'img/edukasi/' . $imageName,
            // ]);
        }

        return redirect()->route('admin.edukasi.index')
            ->with('success', 'Edukasi telah ditambahkan!');
    })->name('admin.edukasi.store');

    Route::get('/edukasi/{id}', function ($id) {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        return view('admin_edukasi_detail');
    })->name('admin.edukasi.show');

    Route::get('/edukasi/{id}/edit', function ($id) {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        return view('admin_edukasi_edit');
    })->name('admin.edukasi.edit');

    Route::delete('/edukasi/{id}', function ($id) {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        // Handle delete logic here
        // $edukasi = Edukasi::findOrFail($id);
        // if (file_exists(public_path($edukasi->gambar))) {
        //     unlink(public_path($edukasi->gambar));
        // }
        // $edukasi->delete();

        return redirect()->route('admin.edukasi.index')
            ->with('success', 'Edukasi berhasil dihapus!');
    })->name('admin.edukasi.destroy');

    // Resep Routes
    Route::get('/resep', function () {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        return view('admin_resep');
    })->name('admin.resep.index');

    Route::get('/resep/create', function () {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        return view('admin_resep_create');
    })->name('admin.resep.create');

    Route::post('/resep/store', function (Request $request) {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        // Validate
        $request->validate([
            'nama' => 'required|string|max:255',
            'bahan' => 'required|string',
            'cara_masak' => 'required|string',
            'energi' => 'nullable|numeric',
            'protein' => 'nullable|numeric',
            'lemak' => 'nullable|numeric',
            'karbohidrat' => 'nullable|numeric',
            'gambar' => 'required|image|mimes:jpeg,jpg,png|max:2048'
        ]);

        // Handle file upload
        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('img/resep'), $imageName);

            // Save to database here
            // Resep::create([
            //     'nama' => $request->nama,
            //     'bahan' => $request->bahan,
            //     'cara_masak' => $request->cara_masak,
            //     'energi' => $request->energi,
            //     'protein' => $request->protein,
            //     'lemak' => $request->lemak,
            //     'karbohidrat' => $request->karbohidrat,
            //     'gambar' => 'img/resep/' . $imageName,
            // ]);
        }

        return redirect()->route('admin.resep.index')
            ->with('success', 'Resep telah ditambahkan!');
    })->name('admin.resep.store');

    Route::get('/resep/{id}', function ($id) {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        return view('admin_resep_detail');
    })->name('admin.resep.show');

    Route::get('/resep/{id}/edit', function ($id) {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        return view('admin_resep_edit');
    })->name('admin.resep.edit');

    Route::delete('/resep/{id}', function ($id) {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }

        // Handle delete logic here
        // $resep = Resep::findOrFail($id);
        // if (file_exists(public_path($resep->gambar))) {
        //     unlink(public_path($resep->gambar));
        // }
        // $resep->delete();

        return redirect()->route('admin.resep.index')
            ->with('success', 'Resep berhasil dihapus!');
    })->name('admin.resep.destroy');

    // Logout
    Route::post('/logout', function () {
        session()->forget('admin_logged_in');
        return redirect()->route('admin.login');
    })->name('admin.logout');
});
