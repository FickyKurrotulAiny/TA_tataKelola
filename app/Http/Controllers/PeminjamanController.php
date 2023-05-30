<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use Carbon\Carbon;
use Yajra\DataTables\DataTables;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $data['navlink'] = 'peminjaman';
        return view('peminjaman.index', $data, compact('request'));
    }


    public function getpeminjaman(Request $request){
        if ($request->ajax()) {
            $data = Peminjaman::select('*');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('tanggal', function($value){
                        $tanggal = Carbon::parse($value->tanggal)->format('d-m-Y');
                        return $tanggal;
                    })
                    ->addColumn('tanggal_kembali', function($value){
                        $tanggal_kembali = Carbon::parse($value->tanggal_kembali)->format('d-m-Y');
                        return $tanggal_kembali;
                    })
                    ->addColumn('action', function($value){
                    $btn = '<div class="d-flex flex-row bd-highlight mb-3">
                        <a href="'.route('peminjaman.show', $value->id).'" class="btn btn-warning mr-3">Lihat</i></a>

                        <a class="btn btn-info mr-3" href="'.route('peminjaman.edit', $value->id).'">Edit</i></a>

                        <button class="btn btn-danger delete" id="'.$value->id.'" nama="'.$value->nama.'" type="submit"
                            onclick="deletePeminjaman('.$value->id.')">Hapus</i></button>
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
        $data['navlink'] = 'peminjaman';
        return view('peminjaman.create', $data);
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
            'tanggal' => 'required',
            'kode_barang' => 'required',
            'nama_barang' => 'required',
            'jumlah_barang' => 'required',
            'nama_peminjam' => 'required',
            'jurusan' => 'required',
            'petugas' => 'required',
            'mengambil' => 'required',
            'tanggal_kembali' => 'required',
        ],[
            'tanggal.required' => 'Tanggal Wajib diisi!',
            'kode_barang.required' => 'Kode Barang Wajib diisi!',
            'nama_barang.required' => 'Nama Barang Wajib diisi!',
            'jumlah_barang.required' => 'Jumlah Barang Wajib diisi!',
            'nama_peminjam.required' => 'Nama Peminjam Wajib diisi!',
            'jurusan.required' => 'Jurusan Wajib diisi!',
            'petugas.required' => 'Petugas Yang Menyerahkan Wajib diisi!',
            'mengambil.required' => 'Yang Mengambil Wajib diisi!',
            'tanggal_kembali.required' => 'Tanggl Kembali Wajib diisi!',
        ]);

        $peminjaman = new Peminjaman();
        $peminjaman = Peminjaman::create($request->all());

        $peminjaman->tanggal = $request->tanggal;
        $peminjaman->kode_barang = $request->kode_barang;
        $peminjaman->nama_barang = $request->nama_barang;
        $peminjaman->jumlah_barang = $request->jumlah_barang;
        $peminjaman->nama_peminjam = $request->nama_peminjam;
        $peminjaman->jurusan = $request->jurusan;
        $peminjaman->petugas = $request->petugas;
        $peminjaman->mengambil = $request->mengambil;
        $peminjaman->tanggal_kembali = $request->tanggal_kembali;
        $peminjaman->save();

        return redirect('peminjaman')->with('success', 'Tambah Peminjaman Sukses!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $data['navlink'] = 'peminjaman';
        return view('peminjaman.show', $data, ['peminjaman' => $peminjaman]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $data['navlink'] = 'peminjaman';
        return view('peminjaman.edit', $data, compact('peminjaman'));
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
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->tanggal = $request->tanggal;
        $peminjaman->kode_barang = $request->kode_barang;
        $peminjaman->nama_barang = $request->nama_barang;
        $peminjaman->jumlah_barang = $request->jumlah_barang;
        $peminjaman->nama_peminjam = $request->nama_peminjam;
        $peminjaman->jurusan = $request->jurusan;
        $peminjaman->petugas = $request->petugas;
        $peminjaman->mengambil = $request->mengambil;
        $peminjaman->tanggal_kembali = $request->tanggal_kembali;
        $peminjaman->save();

        return redirect('peminjaman')->with('success', 'Edit Peminjaman Sukses!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $peminjaman = Peminjaman::find($id);
        $peminjaman->delete();
        return $id;
    }
}
