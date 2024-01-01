<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ApiController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/', [ ApiController::class, 'index']);
Route::group(['prefix'=>'short_url'], function(){
    Route::get('/all_short_url_list', [ ApiController::class, 'all_short_url_list']);
    Route::get('/short_url_by_user/{user}', [ ApiController::class, 'short_url_by_user']);
});
