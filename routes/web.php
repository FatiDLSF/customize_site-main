<?php

use App\Http\Controllers\Dashboard\BannerController;
use App\Http\Controllers\Dashboard\BlogController;
use App\Http\Controllers\Dashboard\InicioDashboardController;
use App\Http\Controllers\Dashboard\LanzaderaController;
use App\Http\Controllers\Dashboard\NoticiaController;
use App\Http\Controllers\Dashboard\SliderController;
use App\Http\Controllers\Dashboard\WebSiteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Web\InicioWebController;
use Illuminate\Support\Facades\Route;


Route::name('web.')->group(function () {
    Route::get('/', [InicioWebController::class, 'index'])->name('index');
});

Route::prefix('mysite')->name('web-site.')->group(function () {
    Route::get('/{dominio}', [WebSiteController::class, 'index'])->name('index');
});


/* Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
 */

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';


Route::prefix('dashboard')->middleware(['auth', 'verified'])->name('dashboard.')->group(function () {

    Route::get('/', [InicioDashboardController::class, 'index'])->name("index");

    Route::get('/actualizar-web-site', [WebSiteController::class, 'update'])->name('actualizar-web-site');
    Route::get('/guardar-web-site', [WebSiteController::class, 'store'])->name('guardar-web-site');

    Route::prefix('sliders')->name('sliders.')->group(function () {
        Route::get('/', [SliderController::class, 'index'])->name("index");

        Route::get('/crear', [SliderController::class, 'create'])->name('crear');
        Route::get('/editar/{id}', [SliderController::class, 'edit'])->name('editar');

        Route::post('/guardar', [SliderController::class, 'store'])->name('guardar');
        Route::post('/actualizar', [SliderController::class, 'update'])->name('actualizar');
        Route::post('/eliminar', [SliderController::class, 'destroy'])->name('eliminar');
    });

    Route::prefix('lanzadera')->name('lanzadera.')->group(function () {
        Route::get('/', [LanzaderaController::class, 'index'])->name("index");
    });

    Route::prefix('banners')->name('banners.')->group(function () {
        Route::get('/', [BannerController::class, 'index'])->name("index");
    });

    Route::prefix('noticias')->name('noticias.')->group(function () {
        Route::get('/', [NoticiaController::class, 'index'])->name("index");
    });

    Route::prefix('blogs')->name('blogs.')->group(function () {
        Route::get('/', [BlogController::class, 'index'])->name("index");
    });
});
