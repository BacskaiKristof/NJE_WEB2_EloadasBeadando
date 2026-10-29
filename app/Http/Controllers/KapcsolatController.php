<?php

namespace App\Http\Controllers;

use App\Models\Uzenet;
use Illuminate\Http\Request;

class KapcsolatController extends Controller
{
    /** Kapcsolat űrlap megjelenítése. */
    public function create()
    {
        return view('kapcsolat');
    }

    /** Űrlap feldolgozása: szerver oldali validáció, majd mentés az adatbázisba. */
    public function store(Request $request)
    {
        $adatok = $request->validate([
            'nev' => ['required', 'string', 'min:3', 'max:100'],
            'email' => ['required', 'email', 'max:150'],
            'targy' => ['required', 'string', 'min:3', 'max:150'],
            'uzenet' => ['required', 'string', 'min:10', 'max:2000'],
        ], [
            'nev.required' => 'A név megadása kötelező.',
            'nev.min' => 'A név legalább :min karakter legyen.',
            'nev.max' => 'A név legfeljebb :max karakter lehet.',
            'email.required' => 'Az e-mail cím megadása kötelező.',
            'email.email' => 'Érvényes e-mail címet adjon meg.',
            'email.max' => 'Az e-mail cím legfeljebb :max karakter lehet.',
            'targy.required' => 'A tárgy megadása kötelező.',
            'targy.min' => 'A tárgy legalább :min karakter legyen.',
            'targy.max' => 'A tárgy legfeljebb :max karakter lehet.',
            'uzenet.required' => 'Az üzenet nem lehet üres.',
            'uzenet.min' => 'Az üzenet legalább :min karakter legyen.',
            'uzenet.max' => 'Az üzenet legfeljebb :max karakter lehet.',
        ]);

        $adatok['user_id'] = $request->user()?->id;

        Uzenet::create($adatok);

        return redirect()->route('kapcsolat')
            ->with('siker', 'Köszönjük, üzenetét megkaptuk!');
    }
}
