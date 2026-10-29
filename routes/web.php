<?php

use App\Http\Controllers\AdatbazisController;
use App\Http\Controllers\DiagramController;
use App\Http\Controllers\FooldalController;
use App\Http\Controllers\KapcsolatController;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\UzenetController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Mindenki (látogató) számára elérhető menük
|--------------------------------------------------------------------------
*/
Route::get('/', [FooldalController::class, 'index'])->name('home');
Route::get('adatbazis', [AdatbazisController::class, 'index'])->name('adatbazis');
Route::get('kapcsolat', [KapcsolatController::class, 'create'])->name('kapcsolat');
Route::post('kapcsolat', [KapcsolatController::class, 'store'])->name('kapcsolat.store');
Route::get('diagram', [DiagramController::class, 'index'])->name('diagram');

/*
|--------------------------------------------------------------------------
| Bejelentkezett (regisztrált) felhasználó
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->group(function () {
    // Bejelentkezés / regisztráció után ide irányít a starter kit -> főoldalra küldjük
    Route::get('dashboard', function () { return redirect()->route('home'); })->name('dashboard');
    Route::get('uzenetek', [UzenetController::class, 'index'])->name('uzenetek');

    // Órai feladat oldalai
    Route::get('user', function () { return view('user'); })->name("user");
    Route::get('admin', 'App\Http\Controllers\AdminController@adminPage');
});

/*
|--------------------------------------------------------------------------
| Csak admin: CRUD a pizza táblához
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::resource('crud', PizzaController::class)->parameters(['crud' => 'pizza']);
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
Route::get('introduction', function () { return redirect()->route('home'); });
