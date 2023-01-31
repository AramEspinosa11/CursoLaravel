<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\EjemploController;
use App\Http\Controllers\ApiCategoriasController;
use App\Http\Controllers\ApiProductosController;
use App\Http\Controllers\ApiProductosFotosController;
use App\Http\Controllers\ApiLoginController;
use App\Http\Controllers\ApiAccesoController;


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


Route::resource('v1/ejemplo', EjemploController::class);
Route::resource('v1/categorias', ApiCategoriasController::class);
Route::resource('v1/productos', ApiProductosController::class);
Route::resource('v1/productos-fotos', ApiProductosFotosController::class);
Route::resource('v1/login', ApiAccesoController::class);
