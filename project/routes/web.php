<?php

use App\Http\Controllers\LinkController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('main.main');
});

Route::post('/link', [LinkController::class, 'createShortLink'])->name('link');
Route::get('/{code}', [LinkController::class, 'redirectLink'])->name('redirect-link');
