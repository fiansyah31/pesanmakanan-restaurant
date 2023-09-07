<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PesananController;
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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', [FoodController::class, 'listFood'])->name('index');
Route::get('/detail/{id}', [FrontController::class, 'detailFood'])->name('detail');
Route::resource('category', CategoryController::class)->middleware('auth');
Route::resource('food', FoodController::class)->middleware('auth');
Route::resource('pesanan', PesananController::class)->middleware('auth');

Route::post('/buatpesanan', [PesananController::class, 'store'])->name('buatpesanan');

Auth::routes(['register' => false]);





//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
