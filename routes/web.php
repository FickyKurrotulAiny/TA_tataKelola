<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;


date_default_timezone_set('Asia/Jakarta');
Route::get('/login', [Controllers\LoginController::class, 'login'])->name('login');
Route::post('/postlogin', [Controllers\LoginController::class, 'postlogin'])->name('postlogin');
Route::get('/logout', [Controllers\LoginController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth']], function() {
    Route::get('/', [Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dasboard1', [Controllers\Dashboard1Controller::class, 'index'])->name('dashboard1');
    Route::resource('/user', Controllers\UserController::class);
    Route::get('getUser', [Controllers\UserController::class, 'getUser'])->name('getUser');

    //dasboard
    Route::get('getDashboard', [Controllers\DashboardController::class, 'getDashboard'])->name('getDashboard');
    Route::get('getDashboard1', [Controllers\Dashboard1Controller::class, 'getDashboard1'])->name('getDashboard1');

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
    Route::get('generatePDFPinjam/{id}', [Controllers\PinjamController::class, 'generatePDFPinjam'])->name('generatePDFPinjam');

    //permintaan
    Route::resource('/permintaan', Controllers\PermintaanController::class);
    Route::get('getPermintaan', [Controllers\PermintaanController::class, 'getPermintaan'])->name('getPermintaan');
    Route::get("generatePDFPermintaan/{id}", [Controllers\PermintaanController::class, 'generatePDFPermintaan' ]);

    //minta
    Route::resource('/minta', Controllers\MintaController::class);
    Route::get('getMinta', [Controllers\MintaController::class, 'getMinta'])->name('getMinta');

    //laporan
    Route::resource('/laporan', Controllers\LaporanController::class);
    Route::get('opsi', [Controllers\LaporanController::class, 'opsi'])->name('opsi');

    Route::get('/barang/search', [Controllers\DashboardController::class, 'search'])->name('search');
    Route::get('/barang/search', [Controllers\Dashboard1Controller::class, 'search'])->name('search');

});
