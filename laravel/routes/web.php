<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogbookController;

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
        Route::post('/home/refresh-periode-map-agen', [HomeController::class, 'refreshPeriodeMapAgen'])->name('home.refreshperiodemapagen');
        Route::post('/home/refresh-pangkalan-map', [HomeController::class, 'refreshPangkalanMap'])->name('home.refreshpangkalanmap');
        Route::post('/home/refresh-agen-map-chart', [HomeController::class, 'refreshAgenMapChart'])->name('home.refreshagenmapchart');
        Route::post('/home/refresh-pangkalan-map-chart', [HomeController::class, 'refreshPangkalanMapChart'])->name('home.refreshpangkalanmapchart');

        //PAGES REPORTS LOGBOOK
        Route::get('/reports/logbook', [LogbookController::class, 'reportLogbook'])->name('reports.logbook');
        Route::post('/reports/get-logbook', [LogbookController::class, 'getReportLogbook'])->name('reports.getlogbook');
    }
);
