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
        $jumlahPeminjaman = Peminjaman::count();
        $jumlahUser = User::count();
        $jumlahPersediaan = Persediaan::count();

        return view('dashboard.index', $data, ['inventaris'=>$jumlahInventaris, 'peminjaman'=>$jumlahPeminjaman, 'user'=>$jumlahUser, 'persediaan'=>$jumlahPersediaan]);
    }
}
