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
Route::get('/editAnggota/{id}', [AnggotaController::class, 'editAnggota']);
Route::put('/updateAnggota/{id}', [AnggotaController::class, 'updateAnggota']);
Route::delete('deleteAnggota/{ida}',[AnggotaController::class,'delete']);
Route::get('list',[AnggotaController::class,'list']);

Route::post('addPinjaman',[PinjamanController::class,'addPinjaman']);
Route::get('/editPinjaman/{id}', [PinjamanController::class, 'editPinjaman']);
Route::put('/updatePinjaman/{id}', [PinjamanController::class, 'updatePinjaman']);
Route::delete('deletePinjaman/{id}',[PinjamanController::class,'deletePinjaman']);
Route::get('listPinjaman',[PinjamanController::class,'listPinjaman']);

Route::post('userAdd',[PinjamanController::class,'userAdd']);
Route::get('/userEdit/{id}', [PinjamanController::class, 'userEdit']);
Route::put('/userUpdate/{id}', [PinjamanController::class, 'userUpdate']);
Route::delete('userDelete/{id}',[PinjamanController::class,'userDelete']);
Route::get('userList',[PinjamanController::class,'userList']);