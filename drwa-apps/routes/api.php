<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/latihansatu', [App\Http\Controllers\LatihanJsonController::class, 'getDataSatu']);
Route::get('/latihandua', [App\Http\Controllers\LatihanJsonController::class, 'getDataDua']);
Route::get('/latihantiga', [App\Http\Controllers\LatihanJsonController::class, 'getDataTiga']);
Route::get('/latihanempat', [App\Http\Controllers\LatihanJsonController::class, 'getDataEmpat']);
Route::get('/latihanlima', [App\Http\Controllers\LatihanJsonController::class, 'getDataLima']);