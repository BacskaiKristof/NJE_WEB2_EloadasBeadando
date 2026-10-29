<?php

namespace App\Http\Controllers;

use App\Models\Kategoria;
use App\Models\Pizza;
use App\Models\Rendeles;

class FooldalController extends Controller
{
    /** Főoldal: az alkalmazás bemutatása, élő adatokkal az adatbázisból. */
    public function index()
    {
        $kategoriak = Kategoria::withCount('pizzak')->orderBy('ar')->get();

        // A 6 legtöbbet rendelt pizza
        $nepszeru = Pizza::with('kategoria')
            ->withSum('rendelesek as rendelt_db', 'darab')
            ->orderByDesc('rendelt_db')
            ->orderBy('nev')
            ->take(6)
            ->get();

        $statisztika = [
            'pizza' => Pizza::count(),
            'vega' => Pizza::where('vegetarianus', true)->count(),
            'rendeles' => Rendeles::count(),
            'darab' => (int) Rendeles::sum('darab'),
        ];

        return view('fooldal', compact('kategoriak', 'nepszeru', 'statisztika'));
    }
}
