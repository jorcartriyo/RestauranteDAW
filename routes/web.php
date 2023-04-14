<?php

use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SuperAdminRoles\RolController;
use App\Http\Controllers\SuperAdminRoles\PermisoController;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;

/*
|--------------------------------------------------------------------------
| Web Routes changes git 555555
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('main');
})->name('inicio');

Route::get('/dashboard', [UserController::class, 'index'])->middleware(['auth', 'verified','permission:admin.dashboard|admin.all'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified', 'role:SuperAdmin'])->group(
    function () {
        Route::resource('/home', UserController::class);
        Route::resource('/roles', RolController::class);
        Route::resource('/permisos', PermisoController::class);
        Route::get('/logs', [UserController::class, 'log'])->name('log');
      //  Route::get('/articulos', [ArticuloController::class, 'index'])->name('articulos');
    }

);
Route::middleware(['auth','verified', 'role:Admin'])->group(
    function () {
        Route::resource('/articulos', ArticuloController::class);
    }
);

require __DIR__.'/auth.php';
