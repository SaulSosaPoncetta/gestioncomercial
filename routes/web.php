<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\SucursalController;
use App\Http\Controllers\ImpuestoController;
use App\Http\Controllers\MonedaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ListaPrecioController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\AlmacenController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');


Route::middleware('auth')->group(function () {
    
    Route::resource('empresas', EmpresaController::class);
    Route::resource('sucursales', SucursalController::class);
    Route::resource('impuestos', ImpuestoController::class);
    Route::resource('monedas', MonedaController::class);
    Route::resource('categorias', CategoriaController::class);
    Route::resource('marcas', MarcaController::class);
    Route::resource('productos', ProductoController::class);
    Route::resource('listas-precios', ListaPrecioController::class);
    Route::get('listas-precios/{listas_precio}/precios', [ListaPrecioController::class, 'precios'])->name('listas-precios.precios');
    Route::post('listas-precios/{listas_precio}/precios', [ListaPrecioController::class, 'guardarPrecios'])->name('listas-precios.guardarPrecios');
    Route::resource('personas', PersonaController::class);
    Route::resource('almacenes', AlmacenController::class);

});

require __DIR__.'/auth.php';