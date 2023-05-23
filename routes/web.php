<?php

use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SuperAdminRoles\RolController;
use App\Http\Controllers\SuperAdminRoles\PermisoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CartaController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\MesaController;
use App\Http\Controllers\PedidosController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\ReservaFrontController;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Contracts\Permission;

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

Route::get('/', [MainController::class,'index'])->name('main');
Route::resource('/carta', CartaController::class);
Route::resource('/menu', MenuController::class);
Route::get('/quienesSomos', function () {
    return view('quienesSomos');
})->name('quienesSomos');

Route::get('/dashboard', [ReservaController::class, 'index'])->middleware(['auth', 'verified', 'permission:admin.dashboard|admin.all'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/fecha', [ReservaController::class, 'fecha'])->name('fecha');
    Route::get('/fechaFront', [ReservaFrontController::class, 'fecha'])->name('fechafront');
    Route::post('/datos', [ReservaController::class, 'datos'])->name('datos');
    Route::post('/datosFront', [ReservaFrontController::class, 'datos'])->name('datosFront');
    Route::get('/reservasfront/{email}', [ReservaFrontController::class, 'reserva'])->name('reserva');
    Route::resource('/front', ReservaFrontController::class);
    Route::resource('/pedidos', PedidosController::class);


});

Route::middleware(['auth', 'verified', 'role:SuperAdmin'])->group(
    function () {
        Route::resource('/home', UserController::class);
        Route::resource('/roles', RolController::class);
        Route::resource('/permisos', PermisoController::class);
        Route::get('/logs', [UserController::class, 'log'])->name('log');

    }

);
Route::middleware(['auth', 'verified', 'role:Admin|SuperAdmin'])->group(
    function () {
        Route::resource('/articulos', ArticuloController::class);
        Route::resource('/categorias', CategoriaController::class);
        Route::resource('/eventos', EventoController::class);
        Route::resource('/fotos', FotoController::class);
        Route::resource('/mesas', MesaController::class);
        Route::resource('/reservas', ReservaController::class);
    }
);

require __DIR__ . '/auth.php';
