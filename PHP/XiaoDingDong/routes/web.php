<?php

use App\Http\Controllers\CartDetailsController;
use App\Http\Controllers\CartHeaderController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\TransactionDetailsController;
use App\Http\Controllers\TransactionHeaderController;
use App\Http\Controllers\UserController;
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
    return redirect('/home');
});

Route::get('/home', [MenuController::class, 'index'])->name('home');

Route::get('/search',  [MenuController::class, 'search'])->middleware('auth')->name('search');

Route::get('/menu/show/{menu}', [MenuController::class, 'show'])->name('item');

Route::get('/register', [UserController::class, 'register'])->middleware('guest')->name('register');
Route::post('/register', [UserController::class, 'store'])->middleware('guest');

Route::get('/login',  [UserController::class, 'login'])->middleware('guest')->name('login');
Route::post('/login', [UserController::class, 'authenticate'])->middleware('guest');

Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

Route::get('/cart', [CartDetailsController::class, 'index'])->name('cart')->middleware('auth');
Route::post('/cart/add', [CartDetailsController::class, 'store'])->middleware('auth');
Route::post('/cart/update', [CartDetailsController::class, 'patch'])->middleware('auth');
Route::post('/cart/delete', [CartDetailsController::class, 'delete'])->middleware('auth');

Route::get('/checkout', [TransactionHeaderController::class, 'checkout'])->middleware('auth');
Route::post('/checkout', [TransactionHeaderController::class, 'create'])->middleware('auth');

Route::get('/menu/update/{menu}', [MenuController::class, 'update'])->middleware('admin');
Route::get('/menu/add', [MenuController::class, 'add'])->middleware('admin');
Route::post('/menu/add', [MenuController::class, 'create'])->middleware('admin');
Route::post('/menu/patch', [MenuController::class, 'patch'])->middleware('admin');
Route::post('/menu/delete', [MenuController::class, 'delete'])->middleware('admin');

Route::get('/profile', [UserController::class, 'update'])->middleware('auth');
Route::post('/profile', [UserController::class, 'patch'])->middleware('auth');

Route::get('/transactions', [TransactionDetailsController::class, 'index'])->middleware('auth');