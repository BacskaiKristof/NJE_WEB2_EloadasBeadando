<?php

namespace App\Http\Controllers;

use App\Models\Uzenet;

class UzenetController extends Controller
{
    /** Üzenetek menü (csak bejelentkezve): fordított időrendben, a legfrissebb elöl. */
    public function index()
    {
        $uzenetek = Uzenet::with('user')
            ->orderByDesc('created_at')
            ->orderByDesc('id')
            ->paginate(20);

        return view('uzenetek', compact('uzenetek'));
    }
}
