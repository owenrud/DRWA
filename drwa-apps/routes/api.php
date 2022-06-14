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

//Guru
Route::middleware('auth:api')->get('/guru', [App\Http\Controllers\GuruController::class, 'getGuruAll']);
Route::middleware('auth:api')->get('/guru/{id}', [App\Http\Controllers\GuruController::class, 'getGuruID']);
Route::middleware('auth:api')->put('/guru/update',[App\Http\Controllers\GuruController::class,'UpdateGuru']);
Route::middleware('auth:api')->post('/guru/create', [App\Http\Controllers\GuruController::class, 'InsertGuru']);
Route::middleware('auth:api')->delete('/guru/delete', [App\Http\Controllers\GuruController::class, 'DeleteGuru']);

//Kelas
Route::middleware('auth:api')->get('/kelas', [App\Http\Controllers\KelasController::class, 'getKelasAll']);
Route::middleware('auth:api')->get('/kelas/{id}', [App\Http\Controllers\KelasController::class, 'getKelasID']);
Route::middleware('auth:api')->put('/kelas/update',[App\Http\Controllers\KelasController::class,'UpdateKelas']);
Route::middleware('auth:api')->post('/kelas/create', [App\Http\Controllers\KelasController::class, 'InsertKelas']);
Route::middleware('auth:api')->delete('/kelas/delete', [App\Http\Controllers\KelasController::class, 'DeleteKelas']);

//Mapel
Route::middleware('auth:api')->get('/mapel', [App\Http\Controllers\MapelController::class, 'getMapelAll']);
Route::middleware('auth:api')->get('/mapel/{id}', [App\Http\Controllers\MapelController::class, 'getMapelID']);
Route::middleware('auth:api')->put('/mapel/update',[App\Http\Controllers\KelasController::class,'UpdateMapel']);
Route::middleware('auth:api')->post('/mapel/create', [App\Http\Controllers\KelasController::class, 'InsertMapel']);
Route::middleware('auth:api')->delete('/mapel/delete', [App\Http\Controllers\KelasController::class, 'DeleteMapel']);

//JadwalGuru
Route::middleware('auth:api')->get('/jadwalguru', [App\Http\Controllers\JadwalGuruController::class, 'getJadwalGuruAll']);
Route::middleware('auth:api')->get('/jadwalguru/{id}', [App\Http\Controllers\JadwalGuruController::class, 'getJadwalGuruID']);
Route::middleware('auth:api')->put('/jadwalguru/update',[App\Http\Controllers\JadwalGuruController::class,'UpdateJadwalGuru']);
Route::middleware('auth:api')->post('/jadwalguru/create', [App\Http\Controllers\JadwalGuruController::class, 'InsertJadwalGuru']);
Route::middleware('auth:api')->delete('/jadwalguru/delete', [App\Http\Controllers\JadwalGuruController::class, 'DeleteJadwalGuru']);

//Presensi Harian
Route::middleware('auth:api')->get('/pre_harian', [App\Http\Controllers\PreHarianController::class, 'getPreHarianAll']);
Route::middleware('auth:api')->get('/pre_harian/{id}', [App\Http\Controllers\PreHarianController::class, 'getPreHarianID']);
Route::middleware('auth:api')->put('/pre_harian/update',[App\Http\Controllers\PreHarianController::class,'UpdatePreHarian']);
Route::middleware('auth:api')->post('/pre_harian/create', [App\Http\Controllers\PreHarianController::class, 'InsertPreHarian']);
Route::middleware('auth:api')->delete('/pre_harian/delete', [App\Http\Controllers\PreHarianController::class, 'DeletePreHarian']);

//Presensi Mengajar
Route::middleware('auth:api')->get('/pre_mengajar', [App\Http\Controllers\PreMengajarController::class, 'getPreMengajarAll']);
Route::middleware('auth:api')->get('/pre_mengajar/{id}', [App\Http\Controllers\PreMengajarController::class, 'getPreMengajarID']);
Route::middleware('auth:api')->put('/pre_mengajar/update',[App\Http\Controllers\PreMengajarController::class,'UpdatePreMengajar']);
Route::middleware('auth:api')->post('/pre_mengajar/create', [App\Http\Controllers\PreMengajarController::class, 'InsertPreMengajar']);
Route::middleware('auth:api')->delete('/pre_mengajar/delete', [App\Http\Controllers\PreMengajarController::class, 'DeletePreMengajar']);


//Latihan JSON Array
Route::get('/latihansatu', [App\Http\Controllers\LatihanJsonController::class, 'getDataSatu']);
Route::get('/latihandua', [App\Http\Controllers\LatihanJsonController::class, 'getDataDua']);
Route::get('/latihantiga', [App\Http\Controllers\LatihanJsonController::class, 'getDataTiga']);
Route::get('/latihanempat', [App\Http\Controllers\LatihanJsonController::class, 'getDataEmpat']);
Route::get('/latihanlima', [App\Http\Controllers\LatihanJsonController::class, 'getDataLima']);