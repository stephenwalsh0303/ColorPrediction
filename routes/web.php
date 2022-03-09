<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomePageController;

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

//Auth routes
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'loginValidate'])->name('loginValidate');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

//HomePage routes
Route::get('/homepage/statisticdata', [HomePageController::class, 'statisticdata'])->name('statisticdata');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
