<?php

use App\Http\Controllers\administrarUsu;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\CrearController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\administrarUsuController;
use App\Http\Controllers\BuscadorController;
use App\Http\Controllers\usuarioController;
use App\Http\Controllers\IdiomaController;
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
    return view('index');
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
    "prefix" => "admin",
    "as" => "admin.",
    "middleware" => ["auth"]
], function () {
    Route::get("/administrar",     [administrarUsuController::class, "adminUsu"])->middleware(['admin'])->name("administrar");
    Route::get("/borrar{usuario}",     [administrarUsuController::class, "borrarUsu"])->name("borrar");
});

Route::group([
    "prefix" => "usuario",
    "as" => "usuario.",
    "middleware" => ["auth"]
], function () {
    Route::get("/usuario",     [usuarioController::class, "usuarioPerfil"])->name("usuario");

});

Route::group([
    "prefix" => "productos",
    "as" => "producto.",
    "middleware" => ["auth"]
], function () {
    Route::get("/",         [ProductoController::class, "listarProductos"])->name("listar");
    Route::get("/crear",     [ProductoController::class, "crearProducto"])->middleware(['admin'])->name("crear");
    Route::post("/guardar",     [ProductoController::class, "guardarProducto"])->name("guardar");
    Route::post("/borrar/{producto}",     [ProductoController::class, "borrarProducto"])->name("borrar");
    Route::post("/editar/{producto}",     [ProductoController::class, "editarProducto"])->middleware(['admin'])->name("editar");
    Route::post("/actualizar/{actualizar}",     [ProductoController::class, "actualizarProducto"])->name("actualizar");
    Route::get('/producto/{id}', [ProductoController::class, 'infoProducto'])->name('info');

});


Route::get('/contacto', function () {
    return view('paginas.contacto');
})->name('contacto');
Route::get('/envios', function () {
    return view('paginas.envios');
})->name('envios');
Route::get('/about', function () {
    return view('paginas.about');
})->name('about');
Route::get('/login', function () {
    return view('auth.login');
})->name('login');



Route::get("/search", [BuscadorController::class, "Buscar"])->name('search');



require __DIR__ . '/auth.php';
