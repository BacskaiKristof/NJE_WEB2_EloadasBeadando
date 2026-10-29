<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Csak admin szerepkörű (role == 1) felhasználót enged tovább.
 * Az órai AdminController-ben lévő ellenőrzés továbbfejlesztése:
 * így több útvonalat (pl. a teljes CRUD-ot) is egyszerre védhetünk vele.
 */
class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Vendég -> bejelentkezés
        if (! $request->user()) {
            return redirect()->route('login');
        }

        // Regisztrált, de nem admin -> főoldal hibaüzenettel
        if ($request->user()->role != 1) {
            return redirect()->route('home')
                ->with('hiba', 'Ehhez az oldalhoz csak admin jogosultsággal férhet hozzá.');
        }

        return $next($request);
    }
}
