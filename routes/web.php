<?php

use App\Http\Controllers\BahanController;
use App\Http\Controllers\BomController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MpsController;
use App\Http\Controllers\MrpController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" midRequest $requesteware group. Make something great!
|
*/

#Auth
Route::get('/', [SessionController::class, 'index'])->name('login.index');
Route::post('/', [SessionController::class, 'login'])->name('login');

# Dasboard
Route::post('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

#Menu
Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
Route::get('/menu/tambah', [MenuController::class, 'create'])->name('menu.create');
Route::post('/menu/tambah', [MenuController::class, 'store'])->name('menu.store');
Route::get('/menu/{id}/show', [MenuController::class, 'show'])->name('menu.show');
Route::put('/menu/{id}/show', [MenuController::class, 'update'])->name('menu.update');
Route::get('/menu/{id}', [MenuController::class, 'destroy'])->name('menu.destroy');

#Bahan
Route::get('/bahan', [BahanController::class, 'index'])->name('bahan.index');
Route::get('/bahan/tambah', [BahanController::class, 'create'])->name('bahan.create');
Route::post('/bahan/tambah', [BahanController::class, 'store'])->name('bahan.store');
Route::get('/bahan/{id}/update', [BahanController::class, 'show'])->name('bahan.show');
Route::put('/bahan/{id}/update', [BahanController::class, 'update'])->name('bahan.update');
Route::get('/bahan/{id}', [BahanController::class, 'destroy'])->name('bahan.destroy');


#BOM
Route::get('/bom', [BomController::class, 'index'])->name('bom.index');
Route::get('/bom/tambah', [BomController::class, 'create'])->name('bom.create');
Route::post('/bom/tambah', [BomController::class, 'store'])->name('bom.store');
Route::get('/bom/{id}/update', [BomController::class, 'show'])->name('bom.show');
Route::put('/bom/{id}/update', [BomController::class, 'update'])->name('bom.update');
Route::get('/bom/{id}', [BomController::class, 'destroy'])->name('bom.destroy');

#MPS
Route::get('/mps', [MpsController::class, 'index'])->name('mps.index');
Route::get('/mps/tambah', [MpsController::class, 'create'])->name('mps.create');
Route::post('/mps/tambah', [MpsController::class, 'store'])->name('mps.store');
Route::get('/mps/{id}/update', [MpsController::class, 'show'])->name('mps.show');
Route::put('/mps/{id}/update', [MpsController::class, 'update'])->name('mps.update');
Route::get('/mps/{id}', [MpsController::class, 'destroy'])->name('mps.destroy');


#MRP
Route::get('/mrp', [MrpController::class, 'index'])->name('mrp.index');
Route::get('/mrp/result/', [MrpController::class, 'result'])->name('mrp.result');
