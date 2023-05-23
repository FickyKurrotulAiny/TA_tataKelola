<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Inventaris;
use App\Models\Peminjaman;
use App\Models\User;
use App\Models\Persediaan;


class DashboardController extends Controller
{
    public function index(){

        $data['navlink'] = 'dashboard';
        $jumlahInventaris = Inventaris::count();
        $jumlahPersediaan = Persediaan::count();
        $jumlahPeminjaman = Peminjaman::count();
        $jumlahUser = User::count();

        return view('dashboard.index', $data, ['inventaris'=>$jumlahInventaris, 'persediaan'=>$jumlahPersediaan, 'peminjaman'=>$jumlahPeminjaman, 'user'=>$jumlahUser]);
    }
}
