<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\CheckController;
use App\Http\Controllers\QRCodeScannerController;
use App\Http\Controllers\DataController;
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

Route::get('/user', function (Request $request) {
    return $request->user();
});



//------------------------------------------------------------------------------


//API login
Route::post('/login',[AuthController::class,'login']);
//API register
Route::post('/register',[AuthController::class,'register']);
//API get location
Route::get('/location', [LocationController::class,'Checklocation']);
//API get เรียกดูข้อมูลในตาราง Users เป็น json
Route::get('/datauser',[UserController::class,"userdata"]);
//API เก็บข้อมูลลงDATABASEหลัง สแกนCHECK_IN-CHECK_OUT
Route::post('/check', [CheckController::class, 'store']);
//API ดึงข้อมูลในตาราง ตาม user_id ที่ login 
Route::get('/checks/{user_id}',[CheckController::class, 'tabel']);
 




//test
Route::get('/status', [UserController::class, 'userOnlineStatus']);
Route::get('/users/{user_id}/checks',[CheckController::class, 'tabelx']);