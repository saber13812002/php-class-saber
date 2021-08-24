<?php

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

Route::get('/debug', function () {
    return phpinfo();
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/saber', function () {
    return view('saber');
});

Route::get('/1', function () {
    return view('layouts.app');
});


Route::get('/2', function () {
    return view('welcome');
});


Route::get('/home', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
