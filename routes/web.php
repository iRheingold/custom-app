<?php

use App\Http\Controllers\PagesController;
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
    return view('welcome');
});

Route::get('/notas', [PagesController::class, 'inicio']);
Route::get('/detalle/{id}',[PagesController::class,'detalle'])->name('notas.detalle');
Route::post('/', [PagesController::class,'crear'])->name('notas.crear');
