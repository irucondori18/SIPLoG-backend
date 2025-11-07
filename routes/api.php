<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransporteController;
use App\Http\Controllers\ProveedorController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/saludo', function () {
    return response()->json([
        'mensaje' => '¡Hola desde Laravel 12!',
        'estado' => 'éxito',
        'fecha' => now()->toDateTimeString()
    ]);
});

Route::prefix('transportes')->controller(TransporteController::class)->group(function () {
    Route::get('/', 'index');     
    // Route::get('{id}', 'show');   
    // Route::post('/', 'store');    
    // Route::put('{id}', 'update'); 
    // Route::delete('{id}', 'destroy'); 
});

Route::prefix('proveedores')->controller(ProveedorController::class)->group(function () {
    Route::get('/', 'index');     
    // Route::get('{id}', 'show');   
    // Route::post('/', 'store');    
    // Route::put('{id}', 'update'); 
    // Route::delete('{id}', 'destroy'); 
});