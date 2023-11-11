<?php

use App\Http\Controllers\Dashboard\BannerController;
use App\Http\Controllers\Dashboard\BlogController;
use App\Http\Controllers\Dashboard\InicioDashboardController;
use App\Http\Controllers\Dashboard\LanzaderaController;
use App\Http\Controllers\Dashboard\NoticiaController;
use App\Http\Controllers\Dashboard\SliderController;
use App\Http\Controllers\Dashboard\WebSiteController;

use Illuminate\Support\Facades\Route;

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
