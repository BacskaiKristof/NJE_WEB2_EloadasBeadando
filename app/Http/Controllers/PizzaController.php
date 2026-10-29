<?php

namespace App\Http\Controllers;

use App\Models\Kategoria;
use App\Models\Pizza;
use Illuminate\Http\Request;

/**
 * CRUD menü (csak admin): a pizza tábla kezelése.
 * Ebben a lépésben: Read (lista és részletek)
 */
class PizzaController extends Controller
{
    /** READ: lista */
    public function index(Request $request)
    {
        $kereses = $request->query('q');

        $pizzak = Pizza::with('kategoria')
            ->withCount('rendelesek')
            ->when($kereses, fn ($q, $k) => $q->where('nev', 'like', "%{$k}%"))
            ->orderBy('nev')
            ->paginate(15)
            ->withQueryString();

        return view('crud.index', compact('pizzak', 'kereses'));
    }

    /** READ: egy pizza részletei */
    public function show(Pizza $pizza)
    {
        $pizza->load(['kategoria', 'rendelesek' => fn ($q) => $q->orderBy('felvetel')]);

        return view('crud.show', compact('pizza'));
    }

}
