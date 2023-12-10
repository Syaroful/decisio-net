<?php

use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\CalculateController;
use App\Http\Controllers\AlternativeController;
use App\Http\Controllers\ValueController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MabacController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/')->group(function(){
    Route::resource('criterias', CriteriaController::class);
    Route::resource('alternatives', AlternativeController::class);
    Route::resource('values', ValueController::class);
    Route::resource('mabac', MabacController::class);
    Route::get('/', [HomeController::class, 'index'])->name('home.index');
});
