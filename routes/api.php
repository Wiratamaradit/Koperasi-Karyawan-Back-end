<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\PinjamanController;

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
Route::post('register',[UserController::class,'register']);
Route::post('login',[UserController::class,'login']);

Route::post('addAnggota',[AnggotaController::class,'addAnggota']);
Route::get('/editAnggota/{id_anggota}', [AnggotaController::class, 'editAnggota']);
Route::put('/updateAnggota/{id_anggota}', [AnggotaController::class, 'updateAnggota']);
Route::delete('deleteAnggota/{id_anggota}',[AnggotaController::class,'delete']);
Route::get('list',[AnggotaController::class,'list']);

Route::post('addPinjaman',[PinjamanController::class,'addPinjaman']);
Route::get('/editPinjaman/{id_pinjaman}', [PinjamanController::class, 'editPinjaman']);
Route::put('/updatePinjaman/{id_pinjaman}', [PinjamanController::class, 'updatePinjaman']);
Route::delete('deletePinjaman/{id_pinjaman}',[PinjamanController::class,'deletePinjaman']);
Route::get('listPinjaman',[PinjamanController::class,'listPinjaman']);