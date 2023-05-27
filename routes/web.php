<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UrlHashController;

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

Route::get('/urls/create', [UrlHashController::class, 'create'])->name('urls.create');
Route::post('/urls', [UrlHashController::class, 'store'])->name('urls.store');
Route::get('/', [UrlHashController::class, 'index'])->name('urls.index');
Route::get('/expired-url', [UrlHashController::class, 'expiredUrl'])->name('expired-url');
Route::get('/{hash}', [UrlHashController::class, 'redirectUrl'])->name('redirect-url');
Route::delete('/urls/{url}', [UrlHashController::class, 'destroy'])->name('urls.destroy');

