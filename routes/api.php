<?php

use App\Http\Controllers\MotoController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/moto', [MotoController::class, 'index']);
Route::get('/moto/{id}', [MotoController::class, 'show']);
Route::post('/moto', [MotoController::class, 'store']);
Route::put('/moto/{id}', [MotoController::class, 'update']);
Route::delete('/moto/{id}', [MotoController::class, 'destroy']);
