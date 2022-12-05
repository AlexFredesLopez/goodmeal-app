<?php

use App\Http\Controllers\Api\ProductosController;
use App\Http\Controllers\Api\TiendaController;
use App\Models\Tienda;
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

Route::apiResource('tiendas', TiendaController::class);
Route::get('/tienda/{id}', [TiendaController::class, 'get']);

Route::apiResource('productos', ProductosController::class);
Route::get('/producto/{id}', [ProductosController::class, 'get']);
