<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\MenuController;

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

Route::get('admin',[AdminController::class, 'index'])->middleware('auth')->name('admin');

Route::group(['prefix' => 'admin-backend', 'middleware' => ['auth']], function (){
    /*RUTAS DEL MENU*/
    Route::get('menu', [MenuController::class, 'index'])->name('menu');
    Route::get('menu/create', [MenuController::class, 'create'])->name('menu.create');
    Route::get('menu/{id}/edit', [MenuController::class, 'edit'])->name('menu.edit');
    Route::post('menu', [MenuController::class, 'store'])->name('menu.store');
    Route::post('menu/guardar-orden', [MenuController::class, 'guardarOrden'])->name('menu.orden');
    Route::put('menu/{id}', [MenuControler::class, 'update'])->name('menu.update');
    Route::delete('menu/{id}/eliminar', [MenuController::class, 'destroy'])->name('menu.destroy');
});
