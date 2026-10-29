<?php

namespace App\Http\Controllers;

use App\Models\Kategoria;
use App\Models\Pizza;
use App\Models\Rendeles;

class DiagramController extends Controller
{
    /** Diagram menü: Chart.js diagramok az adatbázis adataiból. */
    public function index()
    {
        // 1. Bevétel és eladott darab kategóriánként
        $kategoriak = Kategoria::with('pizzak.rendelesek')->orderBy('ar')->get();
        $kategoriaAdat = $kategoriak->map(function ($k) {
            $darab = $k->pizzak->flatMap->rendelesek->sum('darab');

            return [
                'nev' => $k->nev,
                'darab' => $darab,
                'bevetel' => $darab * $k->ar,
                'pizzak' => $k->pizzak->count(),
                'vega' => $k->pizzak->where('vegetarianus', true)->count(),
            ];
        })->values();

        // 2. A 10 legtöbbet rendelt pizza
        $top = Pizza::withSum('rendelesek as rendelt_db', 'darab')
            ->orderByDesc('rendelt_db')
            ->orderBy('nev')
            ->take(10)
            ->get()
            ->map(fn ($p) => ['nev' => $p->nev, 'db' => (int) $p->rendelt_db]);

        // 3. Rendelések száma a felvétel órája szerint (0-23)
        $orak = array_fill(0, 24, 0);
        foreach (Rendeles::all() as $r) {
            $orak[(int) $r->felvetel->format('G')]++;
        }

        return view('diagram', [
            'kategoriaAdat' => $kategoriaAdat,
            'top' => $top,
            'orak' => $orak,
        ]);
    }
}
