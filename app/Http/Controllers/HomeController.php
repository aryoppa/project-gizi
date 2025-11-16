<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Edukasi;
use App\Models\Resep;
use App\Models\Dokumentasi;

class HomeController extends Controller
{
    public function index()
    {
        $edukasis = Edukasi::latest()->take(8)->get();

        
        $carouselItems = $edukasis->map(function($e) {
            return [
                'image' => $e->image ? asset('storage/' . $e->image) : asset('/img/placeholder.png'),
                'title' => $e->title,
                'user'  => $e->author ?? 'Admin',
                'date'  => optional($e->published_at ?? $e->created_at)->format('d M Y'),
                // gunakan url() bukan route() karena route bernama belum ada
                'link'  => url('/edukasi/' . $e->id),
            ];
        });
        // dd($carouselItems->toArray());  
        
        // jika kamu juga pake resep/dokumentasi carousel, buat variabelnya juga:
        $reseps = Resep::latest()->take(8)->get();
        $resepItems = $reseps->map(function($r) {
            return [
                'image'  => $r->image ? asset('storage/' . $r->image) : asset('/img/placeholder.png'),
                'title'  => $r->name,
                'energy' => $r->energy,
                'protein'=> $r->protein,
                'fat'    => $r->fat,
                'carbs'  => $r->carbs,
                'portion'=> $r->portion,
                'link'   => url('/resep/' . $r->id),
            ];
        });
        
        $dokumentasis = Dokumentasi::latest()->take(8)->get();
        $dokItems = $dokumentasis->map(function($d) {
            return [
                'image' => $d->image ? asset('storage/' . $d->image) : asset('/img/placeholder.png'),
                'title' => $d->title ?? 'Dokumentasi',
                'link'  => url('/dokumentasi/' . $d->id),
            ];
        });
        
        return view('home', compact('carouselItems', 'resepItems', 'dokItems'));
    }
}
