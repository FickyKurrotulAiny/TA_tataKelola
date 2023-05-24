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
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        if(Auth::user()->level === 'user'){
            $inventaris = Inventaris::get();
            $persediaans = Persediaan::get();
            return view('dashboard.user', compact('inventaris','persediaans'));
        }else{
            $data['navlink'] = 'dashboard';
            $inventaris = Inventaris::count();
            $peminjaman = Peminjaman::count();
            $user = User::count();
            $persediaan = Persediaan::count();

            return view('dashboard.index', compact('data','inventaris','peminjaman','user','persediaan'));
        }
    }
}
