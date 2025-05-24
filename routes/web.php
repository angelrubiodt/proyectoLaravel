<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactoController;
use Illuminate\Support\Facades\Auth;

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

// Rutas de autenticación
Auth::routes([
    'register' => false,
    'reset' => true,    // Habilitar recuperación de contraseña
    'verify' => true    // Habilitar verificación de email
]);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return redirect()->route('productos.index');
    })->name('dashboard');

    Route::resource('productos', App\Http\Controllers\ProductoControl::class);
});

// Ruta de registro protegida para administradores
Route::middleware(['auth', 'admin.register'])->group(function () {
    Route::get('register', [\App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [\App\Http\Controllers\Auth\RegisterController::class, 'register']);
});

// Rutas de gestión de usuarios para administradores
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
    Route::get('newsletters', [\App\Http\Controllers\Admin\NewsletterController::class, 'index'])->name('newsletters.index');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/contacto', [ContactoController::class, 'store'])->name('contacto.store');

// Ruta para el newsletter
Route::post('/newsletter', [\App\Http\Controllers\NewsletterController::class, 'store'])->name('newsletter.store');

// Ruta para confirmar la suscripción al newsletter
Route::get('/newsletter/confirm/{token}', [\App\Http\Controllers\NewsletterController::class, 'confirm'])->name('newsletter.confirm');


