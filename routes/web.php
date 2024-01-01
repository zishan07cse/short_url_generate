<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShortLinkController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('generate-shorten-link', [App\Http\Controllers\HomeController::class, 'index']);
Route::post('generate-shorten-link',[App\Http\Controllers\HomeController::class, 'store'])->name('generate.shorten.link.post');
Route::post('total-count', [App\Http\Controllers\HomeController::class, 'total_count'])->name('total-count.post');   
Route::get('{code}', 'ShortLinkController@shortenLink')->name('shorten.link');