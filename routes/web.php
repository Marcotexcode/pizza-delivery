<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\ExtraController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RowOrderController;
use App\Http\Controllers\CartController;


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
    return view('auth.login');
});
Route::get('/carrello', function () {
    return view('carrello.index');
});
  
Auth::routes();
Route::resource('pizza', PizzaController::class);
Route::resource('extras', ExtraController::class);
Route::resource('utente', UserController::class);
Route::resource('ordine', RowOrderController::class);
Route::resource('carrello', CartController::class);


Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::post('/filtro', [HomeController::class, 'filtroName'])->name('filtroName');


