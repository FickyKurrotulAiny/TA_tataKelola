<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Inventaris;
use App\Models\Peminjaman;
use App\Models\User;
use App\Models\Persediaan;
use App\Models\Minta;



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
            $taris = Inventaris::where('kondisi_baru')->get();
            $inventaris = Inventaris::get();
            $persediaans = Persediaan::get();
            return view('dashboard.user', compact('inventaris','persediaans', 'taris'));
        }else{
            $data['navlink'] = 'dashboard';
            $inventaris = Inventaris::count();
            $peminjaman = Peminjaman::count();
            $user = User::count();
            $persediaan = Persediaan::count();
            $minta = Minta::count();
            return view('dashboard.index', compact('data','inventaris','peminjaman','user','persediaan', 'minta'));
        }
    }

    public function search(Request $request)
    {
        try{
            $search = $request->search;
            $inventaris = Inventaris::where('nama_barang', 'like', "%" . $search . "%")
                        ->paginate(5);
            $persediaans = Persediaan::where('nama_barang', 'like', "%" . $search . "%")
                        ->paginate(5);
            return view('dashboard.user', compact('inventaris', 'persediaans'))->with('i', ($request->input('page', 1) - 1) * 5);

        }catch(\Exception $e){
            dd($e);
        }
    }

    public function cari(Request $request)
    {
        try{
            $search = $request->search;
            $inventaris = Inventaris::where('nama_barang', 'like', "%" . $search . "%")
                        ->paginate(5);
            $persediaans = Persediaan::where('nama_barang', 'like', "%" . $search . "%")
                        ->paginate(5);
            return view('dashboard.user', compact('inventaris', 'persediaans'))->with('i', ($request->input('page', 1) - 1) * 5);

        }catch(\Exception $e){
            dd($e);
        }
    }
}

