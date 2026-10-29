<?php

namespace App\Http\Controllers;

use App\Models\Kategoria;
use App\Models\Pizza;
use App\Models\Rendeles;
use Illuminate\Http\Request;

class AdatbazisController extends Controller
{
    /**
     * Adatbázis menü: a kategoria, pizza és rendeles tábla adatai (Eloquent ORM).
     */
    public function index(Request $request)
    {
        $kategoriak = Kategoria::withCount('pizzak')->orderBy('ar')->get();

        // Pizzák szűrése kategóriára és vegetáriánusra
        $szuro = [
            'kategoria' => $request->query('kategoria'),
            'vega' => $request->boolean('vega'),
        ];

        $pizzak = Pizza::with('kategoria')
            ->when($szuro['kategoria'], fn ($q, $k) => $q->where('kategorianev', $k))
            ->when($szuro['vega'], fn ($q) => $q->where('vegetarianus', true))
            ->orderBy('nev')
            ->get();

        $rendelesek = Rendeles::with('pizza.kategoria')
            ->orderBy('felvetel')
            ->paginate(15)
            ->withQueryString()
            ->fragment('rendelesek');

        return view('adatbazis', compact('kategoriak', 'pizzak', 'rendelesek', 'szuro'));
    }
}
