<?php

use App\Http\Controllers\Error\ErrorController;
use App\Http\Controllers\Main\DashboardController;
use App\Http\Controllers\Main\KriteriaController;
use App\Http\Controllers\Main\NilaiAlternatifController;
use App\Http\Controllers\Main\PerhitunganController;
use App\Http\Controllers\Main\SubKriteriaController;
use App\Http\Controllers\Main\WisataController;
use App\Http\Controllers\Main\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::prefix('/error')->name('error.')->controller(ErrorController::class)->group(function () {
    Route::get('/forbidden', 'forbidden')->name('forbidden');
});

Route::middleware('auth')->group(function () {
    // Dashboard
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/', 'index')->name('dashboard');
        Route::get('/dashboard/admin', 'adminIndex')->name('dashboard.admin')->middleware('checkRole:admin');
        Route::get('/dashboard/user', 'userIndex')->name('dashboard.user')->middleware('checkRole:user');
    });

    // Kriteria
    Route::controller(KriteriaController::class)->prefix('/kriteria')->name('kriteria.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::middleware(['checkRole:admin'])->group(function () {
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/show/{id}', 'show')->name('show');
            Route::put('/update/{id}', 'update')->name('update');
            Route::delete('/delete/{id}', 'delete')->name('delete');
        });
    });

    // Sub Kriteria
    Route::controller(SubKriteriaController::class)->prefix('/sub-kriteria')->name('sub.kriteria.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/datatable', 'datatable')->name('datatable');
        Route::middleware(['checkRole:admin'])->group(function () {
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/show/{id}', 'show')->name('show');
            Route::put('/update/{id}', 'update')->name('update');
            Route::delete('/delete/{id}', 'delete')->name('delete');
        });
    });

    // Wisata
    Route::controller(WisataController::class)->prefix('/wisata')->name('wisata.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::middleware(['checkRole:admin'])->group(function () {
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/show/{id}', 'show')->name('show');
            Route::put('/update/{id}', 'update')->name('update');
            Route::delete('/delete/{id}', 'delete')->name('delete');
        });
    });

    // Nilai Alternatif
    Route::controller(NilaiAlternatifController::class)->prefix('/nilai-alternatif')->name('nilai.alternatif.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
    });

    // User
    Route::controller(UserController::class)->prefix('/user')->name('user.')->group(function () {
        Route::middleware(['checkRole:admin'])->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/show/{id}', 'show')->name('show');
            Route::put('/update/{id}', 'update')->name('update');
            Route::delete('/delete/{id}', 'delete')->name('delete');
        });

        Route::get('/change-password', 'showChangePassword')->name('change.password');
        Route::post('/change-password', 'updatePassword')->name('update.password');
    });

    // Perhitungan
    Route::controller(PerhitunganController::class)->prefix('/perhitungan')->name('perhitungan.')->group(function () {
        Route::get('/simple-addictive-weighting/{id}', 'saw')->name('saw');
    });

    Route::get('/panduan-aplikasi', [DashboardController::class, 'panduan'])->name('panduan');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
