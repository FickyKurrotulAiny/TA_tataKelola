<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Inventaris;
use App\Models\Peminjaman;
use App\Models\Persediaan;
use App\Models\Minta;
use PDF;

class LaporanController extends Controller
{

    public function opsi(Request $request){
        $inventaris = Inventaris::all();
        $persediaan = Persediaan::all();
        $peminjaman = Peminjaman::all();
        if($request->opsi == "Barang Inventaris"){
            $pdf = PDF::loadview('laporan.inventaris', ['inventaris'=>$inventaris])->setPaper('a4', 'landscape');
            return $pdf->stream('Laporan Inventaris.pdf');
        } else if ($request->opsi == "Barang Persediaan"){
            $pdf = PDF::loadview('laporan.persediaan', ['persediaan'=>$persediaan]);
            return $pdf->stream('Laporan Persediaan.pdf');
        } else if ($request->opsi == "Peminjaman"){
            $pdf = PDF::loadview('laporan.peminjaman', ['peminjaman'=>$peminjaman])->setPaper('a4', 'landscape');
            return $pdf->stream('Laporan peminjaman.pdf');
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $data['navlink'] = 'minta';
        return view('laporan.index', $data, compact('request'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
