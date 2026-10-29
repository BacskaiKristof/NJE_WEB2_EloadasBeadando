<?php

use App\Http\Controllers\KapcsolatController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Mindenki (látogató) számára elérhető menük
|--------------------------------------------------------------------------
*/
Route::get('/', function () {return Inertia::render('welcome');})->name('home');
Route::get('kapcsolat', [KapcsolatController::class, 'create'])->name('kapcsolat');
Route::post('kapcsolat', [KapcsolatController::class, 'store'])->name('kapcsolat.store');

/*
|--------------------------------------------------------------------------
| Bejelentkezett (regisztrált) felhasználó
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->group(function () {
    // Bejelentkezés / regisztráció után ide irányít a starter kit -> főoldalra küldjük
    Route::get('dashboard', function () { return redirect()->route('home'); })->name('dashboard');

    // Órai feladat oldalai
    Route::get('user', function () { return view('user'); })->name("user");
    Route::get('admin', 'App\Http\Controllers\AdminController@adminPage');
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';

/*
| A bejelentkezés és regisztráció ŰRLAPJÁT a template stílusú Blade nézettel
| jelenítjük meg (az auth.php-ben lévő React oldal helyett).
| A POST kéréseket továbbra is a starter kit controllerei kezelik.
| Ezeknek az auth.php után kell lenniük, hogy felülírják az ottani GET útvonalakat.
*/
Route::middleware('guest')->group(function () {
    Route::get('login', function () { return view('auth.login'); })->name('login');
    Route::get('register', function () { return view('auth.register'); })->name('register');
});

// Órai feladatok
Route::get('exercise1', function () { return view('view1'); });
Route::get('introduction', function () { return view('introduction'); });
