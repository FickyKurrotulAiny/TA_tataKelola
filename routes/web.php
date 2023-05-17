<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PersediaanController;


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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/home', function () {
//     return view('home');
// });

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/postlogin', [LoginController::class, 'postlogin'])->name('postlogin');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// user
Route::resource('/user', UserController::class);
Route::get('getUser', [UserController::class, 'getUser'])->name('getUser');
// Route::post('/login', [LoginController::class, 'authenticate'])->name('login1');
// Route::get('/logout', [LoginController::class, 'actionlogout'])->name('logout');



// Route::get('/dashboard', function (){
//     return view('index');
// });

//dasboard
Route::get('getDashboard', [DashboardController::class, 'getDashboard'])->name('getDashboard');

//peminjaman
Route::resource('/peminjaman', PeminjamanController::class);
Route::get('getPeminjaman', [PeminjamanController::class, 'getPeminjaman'])->name('getPeminjaman');

//barang.inventaris
Route::resource('/inventaris', InventarisController::class);
Route::get('getInventaris', [InventarisController::class, 'getInventaris'])->name('getInventaris');

//barang.persediaan
Route::resource('/persediaan', PersediaanController::class);
Route::get('getPersediaan', [PersediaanController::class, 'getPersediaan'])->name('getPersediaan');
