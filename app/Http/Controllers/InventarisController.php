<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventaris;
use Yajra\DataTables\DataTables;

class InventarisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $data['navlink'] = 'inventaris';
        return view('barang.inventaris.index', $data, compact('request'));
    }

    public function getinventaris(Request $request){
        if ($request->ajax()) {
            $data = Inventaris::select('*');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($value){
                    $btn = '<div class="d-flex flex-row bd-highlight mb-3">
                    <a href="'.route('inventaris.show', $value->id).'"
                        class="btn btn-warning btn-sm"><i class="fas fa-eye"></i>&nbsp;</a>&nbsp;&nbsp;

                    <a class="btn btn-info btn-sm"
                        href="'.route('inventaris.edit', $value->id).'"><i
                            class="fas fa-pen"></i>&nbsp;</a>&nbsp;&nbsp;

                    <button class="btn btn-danger delete" id="'.$value->id.'"
                        nama="'.$value->nama.'" type="submit" onclick="deleteInventaris('.$value->id.')"><i
                            class="fas fa-trash"></i></button>
                </div>';
                    return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['navlink'] = 'user';
        return view('barang.inventaris.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'satuan' => 'required',
            'tahun_peroleh' => 'required',
            'sumber_anggaran' => 'required',
            'NUP' => 'required',
            'merk' => 'required',
            'jumlah' => 'required',
            'nilai_barang' => 'required',
            'kondisi_baru' => 'required',
            'kondisi_rusakRingan' => 'required',
            'kondisi_rusakBerat' => 'required',
            'kondisi_hilang' => 'required',
            'pelebelan_sudah' => 'required',
            'pelebelan_belum' => 'required',
            'namapengguna_unit' => 'required',
            'namapengguna_individu' => 'required',
            'nama_gedung' => 'required',
            'nama_ruangan' => 'required',
            'tempat' => 'required',
            'keterangan' => 'required',
        ],[
            'kode_barang.required' => 'Kode Barang Wajib diisi!',
            'nama_barang.required' => 'Nama Barang Wajib diisi!',
            'satuan.required' => 'Satuan Barang Wajib diisi!',
            'tahun_peroleh.required' => 'Tahun Peroleh Wajib diisi!',
            'sumber_anggaran.required' => 'Sumber Anggaran Wajib diisi!',
            'NUP.required' => 'NUP Wajib diisi!',
            'merk.required' => 'Merk/Type Wajib diisi!',
            'jumlah.required' => 'Jumlah Wajib diisi!',
            'nilai_barang.required' => 'Nilai Barang Wajib diisi!',
            'kondisi_baru.required' => 'Kodisi (B) Barang Wajib diisi!',
            'kondisi_rusakRingan.required' => 'Kondisi (RR) Wajib diisi!',
            'kondisi_rusakBerat.required' => 'Kondisi (RB) Wajib diisi!',
            'kondisi_hilang.required' => 'Kondisi (hilang) Wajib diisi!',
            'pelebelan_sudah.required' => 'Pelebelan (S) Wajib diisi!',
            'pelebelan_belum.required' => 'Pelebelan (B) Wajib diisi!',
            'namapengguna_unit.required' => 'Nama Pengguna (Unit) Barang Wajib diisi!',
            'namapengguna_individu.required' => 'Nama Pengguna (Individu) Wajib diisi!',
            'nama_gedung.required' => 'Nama Gedung Wajib diisi!',
            'nama_ruangan.required' => 'Nama Ruangan Wajib diisi!',
            'tempat.required' => 'Nama Tempat Wajib diisi!',
            'keterangan.required' => 'Keterangan Wajib diisi!',
        ]);

        $inventaris = new Inventaris();
        $inventaris = Inventaris::create($request->all());

        $inventaris->kode_barang = $request->kode_barang;
        $inventaris->nama_barang = $request->nama_barang;
        $inventaris->satuan = $request->satuan;
        $inventaris->tahun_peroleh = $request->tahun_peroleh;
        $inventaris->sumber_anggaran = $request->sumber_anggaran;
        $inventaris->NUP = $request->NUP;
        $inventaris->merk = $request->merk;
        $inventaris->jumlah = $request->jumlah;
        $inventaris->nilai_barang = $request->nilai_barang;
        $inventaris->kondisi_baru = $request->kondisi_baru;
        $inventaris->kondisi_rusakRingan = $request->kondisi_rusakRingan;
        $inventaris->kondisi_rusakBerat = $request->kondisi_rusakBerat;
        $inventaris->kondisi_hilang = $request->kondisi_hilang;
        $inventaris->pelebelan_sudah = $request->pelebelan_sudah;
        $inventaris->pelebelan_belum = $request->pelebelan_belum;
        $inventaris->namapengguna_unit = $request->namapengguna_unit;
        $inventaris->namapengguna_individu = $request->namapengguna_individu;
        $inventaris->nama_gedung = $request->nama_gedung;
        $inventaris->nama_ruangan = $request->nama_ruangan;
        $inventaris->tempat = $request->tempat;
        $inventaris->keterangan = $request->keterangan;
        $inventaris->save();

        return redirect('inventaris')->with('success', 'Tambah Inventaris Sukses!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inventaris = Inventaris::findOrFail($id);
        $data['navlink'] = 'inventaris';
        return view('barang.inventaris.show', $data, ['inventaris' => $inventaris]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inventaris = Inventaris::findOrFail($id);
        $data['navlink'] = 'inventaris';
        return view('barang.inventaris.edit', $data, compact('inventaris'));
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
        $inventaris = Inventaris::findOrFail($id);

        $inventaris->kode_barang = $request->kode_barang;
        $inventaris->nama_barang = $request->nama_barang;
        $inventaris->satuan = $request->satuan;
        $inventaris->tahun_peroleh = $request->tahun_peroleh;
        $inventaris->sumber_anggaran = $request->sumber_anggaran;
        $inventaris->NUP = $request->NUP;
        $inventaris->merk = $request->merk;
        $inventaris->jumlah = $request->jumlah;
        $inventaris->nilai_barang = $request->nilai_barang;
        $inventaris->kondisi_baru = $request->kondisi_baru;
        $inventaris->kondisi_rusakRingan = $request->kondisi_rusakRingan;
        $inventaris->kondisi_rusakBerat = $request->kondisi_rusakBerat;
        $inventaris->kondisi_hilang = $request->kondisi_hilang;
        $inventaris->pelebelan_sudah = $request->pelebelan_sudah;
        $inventaris->pelebelan_belum = $request->pelebelan_belum;
        $inventaris->namapengguna_unit = $request->namapengguna_unit;
        $inventaris->namapengguna_individu = $request->namapengguna_individu;
        $inventaris->nama_gedung = $request->nama_gedung;
        $inventaris->nama_ruangan = $request->nama_ruangan;
        $inventaris->tempat = $request->tempat;
        $inventaris->keterangan = $request->keterangan;
        $inventaris->save();

        return redirect('inventaris')->with('success', 'Edit Inventaris Sukses!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inventaris = Inventaris::find($id);
        $inventaris->delete();
        return $id;
    }
}
