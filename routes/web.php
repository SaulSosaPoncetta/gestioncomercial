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
use App\Http\Controllers\StockController;
use App\Http\Controllers\CompraController;

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
    Route::get('stock', [StockController::class, 'index'])->name('stock.index');
    Route::get('stock/ajustar', [StockController::class, 'ajustar'])->name('stock.ajustar');
    Route::post('stock/ajustar', [StockController::class, 'guardarAjuste'])->name('stock.guardarAjuste');
    Route::get('stock/historial', [StockController::class, 'historial'])->name('stock.historial');
    Route::get('compras', [CompraController::class, 'index'])->name('compras.index');
    Route::get('compras/crear', [CompraController::class, 'create'])->name('compras.create');
    Route::post('compras', [CompraController::class, 'store'])->name('compras.store');
    Route::get('compras/{compra}', [CompraController::class, 'show'])->name('compras.show');

});

require __DIR__.'/auth.php';