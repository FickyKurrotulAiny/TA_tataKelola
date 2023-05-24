<?php

use Illuminate\Support\Facades\Route;


date_default_timezone_set('Asia/Jakarta');
Route::get('/login', [Controllers\LoginController::class, 'login'])->name('login');
Route::post('/postlogin', [Controllers\LoginController::class, 'postlogin'])->name('postlogin');
Route::get('/logout', [Controllers\LoginController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth']], function() {
    Route::get('/', [Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/user', Controllers\UserController::class);
    Route::get('getUser', [Controllers\UserController::class, 'getUser'])->name('getUser');
    // Route::post('/login', [Controllers\LoginController::class, 'authenticate'])->name('login1');
    // Route::get('/logout', [Controllers\LoginController::class, 'actionlogout'])->name('logout');

    //dasboard
    Route::get('getDashboard', [Controllers\DashboardController::class, 'getDashboard'])->name('getDashboard');

    //peminjaman
    Route::resource('/peminjaman', Controllers\PeminjamanController::class);
    Route::get('getPeminjaman', [Controllers\PeminjamanController::class, 'getPeminjaman'])->name('getPeminjaman');

    //barang.inventaris
    Route::resource('/inventaris', Controllers\InventarisController::class);
    Route::get('getInventaris', [Controllers\InventarisController::class, 'getInventaris'])->name('getInventaris');

    //barang.persediaan
    Route::resource('/persediaan', Controllers\PersediaanController::class);
    Route::get('getPersediaan', [Controllers\PersediaanController::class, 'getPersediaan'])->name('getPersediaan');

    //pinjam
    Route::resource('/pinjam', Controllers\PinjamController::class);
    Route::get('getPinjam', [Controllers\PinjamController::class, 'getPinjam'])->name('getPinjam');
    Route::get('generatePDFPinjam/{$id}', [Controllers\PinjamController::class, 'generatePDFPinjam'])->name('generatePDFPinjam');
});
