<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\DokumentasiController;
use App\Http\Controllers\Admin\EdukasiController;
use App\Http\Controllers\Admin\ResepController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/tentang_kami', function () {
    return view('tentang_kami');
});

Route::get('/dokumentasi', function () {
    return view('dokumentasi');
});

Route::get('/edukasi', [EdukasiController::class, 'home_index'])->name('edukasi.index');
Route::get('/edukasi/{edukasi}', [EdukasiController::class, 'show'])->name('edukasi.show');

Route::get('/edukasi/{id}', function ($id) {
    return view('detail_edukasi');
});

Route::get('/resep', [ResepController::class, 'home_index'])->name('resep.index');

Route::get('/resep/{resep}', [ResepController::class, 'show'])->name('resep.show');

Route::get('/mealplan', function () {
    return view('mealplan');
});

Route::get('/admin_login', function () {
    return view('admin_login');
});

// Public routes — dihitung oleh middleware
Route::middleware(['web', 'count.visitor'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::get('/tentang_kami', function () { return view('tentang_kami'); });

    Route::get('/dokumentasi', function () { return view('dokumentasi'); });

    Route::get('/edukasi', [EdukasiController::class, 'home_index'])->name('edukasi.index');
    Route::get('/edukasi/{id}', function ($id) { return view('detail_edukasi'); });

    Route::get('/resep', [ResepController::class, 'home_index'])->name('resep.index');
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
    
    // admin edukasi management
    Route::get('/edukasi', [EdukasiController::class, 'index'])->name('admin.edukasi.index');
    Route::get('/edukasi/create', [EdukasiController::class, 'create'])->name('admin.edukasi.create');
    Route::post('/edukasi/store', [EdukasiController::class, 'store'])->name('admin.edukasi.store');
    Route::get('/edukasi/{edukasi}', [EdukasiController::class, 'show'])->name('admin.edukasi.show');
    Route::get('/edukasi/{edukasi}/edit', [EdukasiController::class, 'edit'])->name('admin.edukasi.edit');
    Route::put('/edukasi/{edukasi}', [EdukasiController::class, 'update'])->name('admin.edukasi.update');
    Route::delete('/edukasi/{edukasi}', [EdukasiController::class, 'destroy'])->name('admin.edukasi.destroy');

    // admin resep management
    Route::get('/resep', [ResepController::class, 'index'])->name('admin.resep.index');
    Route::get('/resep/create', [ResepController::class, 'create'])->name('admin.resep.create');
    Route::post('/resep/store', [ResepController::class, 'store'])->name('admin.resep.store');
    Route::get('/resep/{resep}', [ResepController::class, 'show'])->name('admin.resep.show');
    Route::get('/resep/{resep}/edit', [ResepController::class, 'edit'])->name('admin.resep.edit');
    Route::put('/resep/{resep}', [ResepController::class, 'update'])->name('admin.resep.update');
    Route::delete('/resep/{resep}', [ResepController::class, 'destroy'])->name('admin.resep.destroy');

    // Admin Dashboard View
    Route::get('/dashboard', function () {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        // Ambil statistik visits untuk ditampilkan di dashboard
        $totalVisits = \App\Models\Visit::count();
        $totaldokumentasi = \App\Models\Dokumentasi::count();
        $totaledukasi = \App\Models\Edukasi::count();
        $totalresep = \App\Models\Resep::count();

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

            $dokumentasis     = \App\Models\Dokumentasi::latest()->take(4)->get();
            $edukasis        = \App\Models\Edukasi::latest()->take(4)->get();
            $reseps          = \App\Models\Resep::latest()->take(4)->get();

            return view('admin_dashboard', compact('totalVisits', 'topPages', 'visitsLast7', 'dokumentasis', 'totaldokumentasi', 'totaledukasi', 'totalresep', 'edukasis', 'reseps'));
        })->name('admin.dashboard');
        

    // Logout
    Route::post('/logout', function () {
        session()->forget('admin_logged_in');
        return redirect()->route('admin.login');
    })->name('admin.logout');
});
