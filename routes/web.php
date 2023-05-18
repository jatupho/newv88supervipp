<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CheckController;
use resources\views\checks;
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
///หน้าเพิ่ม user
Route::get('/create', function () {
    return view('create');
})->name('users.create');
//เว็บดูข้อมูลCHECK_IN CHECK_OUT
Route::get('/search', [CheckController::class, 'index']);

// Route::get('/search', [CheckController::class, 'searchx']);

Route::get('/id/{user_id}', [CheckController::class, 'searchid'])->name('searchid.check');
Route::get('/name/{name}', [CheckController::class, 'searchname'])->name('searchname.check');
Route::get('/email/{email}', [CheckController::class, 'searchemail'])->name('searchemail.check');
Route::get('/location/{location}', [CheckController::class, 'searchlocation'])->name('searchlocation.check');
// Route::get('/checks/{searchText}', [CheckController::class, 'searchname'])->name('searchname.check');


// Route::get('/checks/column/{columnName}',[CheckController::class, 'search'])->name('search.check');

require __DIR__.'/api.php';