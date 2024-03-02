<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Site\SiteController as SiteController;
use App\Http\Controllers\Sleeps\SleepController as SleepController;
use App\Http\Controllers\Eats\EatController as EatController;
use App\Http\Controllers\Walks\WalkController as WalkController;
use App\Http\Controllers\Reports\ReportController as ReportController;
use App\Http\Controllers\Diapers\DiaperController as DiaperController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth'])->group(function () {

    Route::resources([
        'sleep' => SleepController::class,
        'eat' => EatController::class,
        'walk' => WalkController::class,
        'report' => ReportController::class,
        'diaper' => DiaperController::class,
    ]);

    Route::match(['get', 'post'], '/sleep-report', [SleepController::class, 'sleep_report'])->name('sleep-report');
    //Route::get('/home', [SiteController::class, 'index'])->name('site.home');
    Route::get('/', [SiteController::class, 'index'])->name('site.index');

});

Route::middleware(['guest'])->group(function () {

    Route::any('/login', function () {
        return view('auth.login');
    });

//    Route::any('/home', function () {
//        return view('auth.login');
//    });

    Route::any('/', function () {
        return view('auth.login');
    });

});


