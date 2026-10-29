<?php

namespace App\Http\Controllers;

use App\Models\Kategoria;
use App\Models\Pizza;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

/**
 * CRUD menü (csak admin): a pizza tábla kezelése.
 * Create, Read, Update, Delete
 */
class PizzaController extends Controller
{
    private array $uzenetek = [
        'nev.required' => 'A pizza nevének megadása kötelező.',
        'nev.max' => 'A név legfeljebb :max karakter lehet.',
        'nev.unique' => 'Ilyen nevű pizza már létezik.',
        'nev.not_regex' => 'A név nem tartalmazhat / jelet.',
        'kategorianev.required' => 'Válasszon kategóriát.',
        'kategorianev.exists' => 'A kiválasztott kategória nem létezik.',
    ];

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

    /** CREATE: űrlap */
    public function create()
    {
        return view('crud.create', ['kategoriak' => Kategoria::orderBy('ar')->get()]);
    }

    /** CREATE: mentés */
    public function store(Request $request)
    {
        $adatok = $request->validate([
            'nev' => ['required', 'string', 'max:50', 'not_regex:/\//', Rule::unique('pizza', 'nev')],
            'kategorianev' => ['required', Rule::exists('kategoria', 'nev')],
        ], $this->uzenetek);
        $adatok['vegetarianus'] = $request->boolean('vegetarianus');

        Pizza::create($adatok);

        return redirect()->route('crud.index')->with('siker', "A(z) \"{$adatok['nev']}\" pizza felvéve.");
    }

    /** READ: egy pizza részletei */
    public function show(Pizza $pizza)
    {
        $pizza->load(['kategoria', 'rendelesek' => fn ($q) => $q->orderBy('felvetel')]);

        return view('crud.show', compact('pizza'));
    }

    /** UPDATE: űrlap */
    public function edit(Pizza $pizza)
    {
        return view('crud.edit', [
            'pizza' => $pizza,
            'kategoriak' => Kategoria::orderBy('ar')->get(),
        ]);
    }

    /** UPDATE: mentés (a név is módosítható, a rendelések ON UPDATE CASCADE-del követik) */
    public function update(Request $request, Pizza $pizza)
    {
        $adatok = $request->validate([
            'nev' => ['required', 'string', 'max:50', 'not_regex:/\//', Rule::unique('pizza', 'nev')->ignore($pizza->nev, 'nev')],
            'kategorianev' => ['required', Rule::exists('kategoria', 'nev')],
        ], $this->uzenetek);
        $adatok['vegetarianus'] = $request->boolean('vegetarianus');

        $pizza->update($adatok);

        return redirect()->route('crud.index')->with('siker', "A(z) \"{$pizza->nev}\" pizza módosítva.");
    }

    /** DELETE */
    public function destroy(Pizza $pizza)
    {
        $nev = $pizza->nev;
        $pizza->delete(); // a hozzá tartozó rendelések ON DELETE CASCADE-del törlődnek

        return redirect()->route('crud.index')->with('siker', "A(z) \"{$nev}\" pizza törölve.");
    }
}
