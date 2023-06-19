<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FamilyController;

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

// Route::get('/', function () {
//     return view('list');
// });

Route::get('/', [CustomerController::class, 'index']);
Route::get('/create', [CustomerController::class, 'create']);
Route::post('/store', [CustomerController::class, 'store']);
Route::put('/customer/{customer}/update', [CustomerController::class, 'update']);
Route::delete('/customer/{id}/delete', [CustomerController::class, 'destroy']);
Route::get('/customer/{customer}/edit', [CustomerController::class, 'edit']);

Route::get('/customer/{customer}/family', [FamilyController::class, 'index']);
Route::get('/customer/{customer}/family/create', [FamilyController::class, 'create']);
Route::post('/customer/{customer}/family/store', [FamilyController::class, 'store']);
Route::delete('/customer/{cst_id}/family/{fl_id}/delete', [FamilyController::class, 'destroy']);