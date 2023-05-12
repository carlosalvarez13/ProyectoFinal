<?php

use App\Http\Controllers\CarritoController;
use App\Http\Controllers\CrearController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Models\Producto;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('productos.main');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile',    [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile',  [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::group([
    "prefix" => "productos",
    "as" => "producto.",
    "middleware" => ["auth"]
], function () {
    Route::get("/",         [ProductoController::class, "listarProductos"])->name("listar");
    Route::get("/crear",     [ProductoController::class, "crearProducto"])->middleware(['admin'])->name("crear");
    Route::post("/guardar",     [ProductoController::class, "guardarProducto"])->name("guardar");
    Route::post("/borrar{producto}",     [ProductoController::class, "borrarProducto"])->name("borrar");
    Route::post("/editar{producto}",     [ProductoController::class, "editarProducto"])->middleware(['admin'])->name("editar");
    Route::post("/actualizar{actualizar}",     [ProductoController::class, "actualizarProducto"])->name("actualizar");
});

Route::group([
    "prefix" => "carrito",
    "as" => "carrito.",
    "middleware" => ["auth"]
],function () {
    Route::get("/carrito",  [CarritoController::class, "listarCarrito"])->name("carrito");
    Route::post("/add{idPro}",     [CarritoController::class, "addProducto"])->name("agregar");
    Route::post("/quitar{idPro}",     [CarritoController::class, "quitarProducto"])->name("quitar");
});

require __DIR__ . '/auth.php';
