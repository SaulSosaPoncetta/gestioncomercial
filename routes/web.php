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
use App\Http\Controllers\VentaController;
use App\Http\Controllers\CajaChicaController;

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
    Route::get('ventas', [VentaController::class, 'index'])->name('ventas.index');
    Route::get('ventas/crear', [VentaController::class, 'create'])->name('ventas.create');
    Route::post('ventas', [VentaController::class, 'store'])->name('ventas.store');
    Route::get('ventas/{venta}', [VentaController::class, 'show'])->name('ventas.show');
    Route::get('ventas-ajax/precios-por-lista', [VentaController::class, 'preciosPorLista'])->name('ventas.preciosPorLista');
    Route::resource('cajas', CajaChicaController::class)->except(['show']);
    Route::get('cajas/{caja}/abrir', [CajaChicaController::class, 'abrir'])->name('cajas.abrir');
    Route::post('cajas/{caja}/abrir', [CajaChicaController::class, 'guardarApertura'])->name('cajas.guardarApertura');
    Route::get('cajas-sesion/{sesion}', [CajaChicaController::class, 'sesion'])->name('cajas.sesion');
    Route::post('cajas-sesion/{sesion}/movimiento', [CajaChicaController::class, 'guardarMovimiento'])->name('cajas.guardarMovimiento');
    Route::get('cajas-sesion/{sesion}/cerrar', [CajaChicaController::class, 'formularioCierre'])->name('cajas.formularioCierre');
    Route::post('cajas-sesion/{sesion}/cerrar', [CajaChicaController::class, 'guardarCierre'])->name('cajas.guardarCierre');

});

require __DIR__.'/auth.php';