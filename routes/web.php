<?php

use Illuminate\Support\Facades\Route;
use App\Models\Producto;
use App\Http\Controllers\{
    Api\ContactController,
    DashboardController,
    HomeController,
    ImageController,
    ProductController,
    ProfileController,
    SettingController,
    UserController
};

// 🌐 Rutas públicas
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/productos', [ProductController::class, 'index'])
    ->name('products.index');

Route::get('/productos/{product}', [ProductController::class, 'show'])
    ->name('products.show');

// 📨 Rutas de contacto
Route::get('/contacto', function () {
    return view('contact.form');
})->name('contact.form');

Route::get('/contacto/producto/{id}', function ($id) {
    $producto = Producto::findOrFail($id);
    return view('contact.form', compact('producto'));
})->name('contact.form.producto');

Route::post('/contact', [ContactController::class, 'store'])
    ->name('contact.store');

// 🔐 Rutas protegidas (requieren autenticación y verificación)
Route::middleware(['auth', 'verified'])->group(function () {
    // 📊 Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::get('/dashboard/contacts', [DashboardController::class, 'getContacts'])
        ->name('dashboard.contacts');

    Route::get('/dashboard/statistics', [DashboardController::class, 'getStatistics'])
        ->name('dashboard.statistics');

    Route::get('/dashboard/export-csv', [DashboardController::class, 'exportCsv'])
        ->name('dashboard.exportCsv');

    // 👤 Perfil de usuario
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    // 🛒 CRUD de productos (excepto index y show públicos)
    Route::resource('products', ProductController::class)
        ->except(['index', 'show']);

    // ⚙️ Ajustes de la aplicación
    Route::get('/settings', [SettingController::class, 'index'])
        ->name('settings.index');

    Route::put('/settings', [SettingController::class, 'update'])
        ->name('settings.update');

    // 🖼️ CRUD de imágenes
    Route::resource('images', ImageController::class);

    // 👥 CRUD de usuarios
    Route::resource('users', UserController::class);
});

// 🔐 Rutas de autenticación (descomentar si usás Laravel Breeze, Jetstream, etc.)
// require __DIR__.'/auth.php';