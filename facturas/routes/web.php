<?php

use App\Http\Controllers\CompraController;
use App\Http\Controllers\FacturaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [ProductController::class, 'index'])->name('dashboard');

Route::group(['prefix' => 'admin', 'middleware' => 'AdminMiddleware'], function () {
    Route::post('generar-facturas', [FacturaController::class, 'generar'])->name('generar.facturas');
    Route::get('index', [FacturaController::class, 'index'])->name('index.facturas');
    Route::get('mostrar-factura/{factura_id}', [FacturaController::class, 'show'])->name('show.facturas');
});

Route::group(['middleware' => 'ClienteMiddleware'], function () {
    Route::get('realizar-compra', [CompraController::class, 'create'])->name('create.compra');
    Route::post('realizar-compra', [CompraController::class, 'store'])->name('store.compra');
    Route::get('mostrar-compra/{compra_id}', [CompraController::class, 'show'])->name('show.compra');
    Route::get('editar-compra/{compra_id}', [CompraController::class, 'edit'])->name('edit.compra');
    Route::PUT('editar-compra/{compra_id}', [CompraController::class, 'update'])->name('update.compra');
    Route::DELETE('eliminar-compra/{compra_id}', [CompraController::class, 'destroy'])->name('destroy.compra');
});