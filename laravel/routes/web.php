<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

//ui Auth::routes(); uses a function auth() defined in vendor/laravel/ui/src/AuthRouteMethods.php
Auth::routes();

Route::middleware(['auth'])->group(
    function () {
        // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

        //HOME
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        Route::get('/', [HomeController::class, 'index'])->name('dashboard.home');

        //HOME ROUTES
        Route::post('/home/refresh-periode-logbook-agen', [HomeController::class, 'refreshPeriodeLogbookAgen'])->name('home.refreshperiodelogbookagen');
        Route::post('/home/refresh-pangkalan-logbook', [HomeController::class, 'refreshPangkalanLogbook'])->name('home.refreshpangkalanlogbook');
        Route::post('/home/refresh-agen-logbook-chart', [HomeController::class, 'refreshAgenLogbookChart'])->name('home.refreshagenlogbookchart');
    }
);
