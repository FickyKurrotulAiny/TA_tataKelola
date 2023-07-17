<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use Carbon\Carbon;
use Yajra\DataTables\DataTables;
use App\Models\Inventaris;
use App\Models\PeminjamanDetail;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['navlink'] = 'peminjaman';
        return view('peminjaman.index', $data, compact('request'));
    }


    public function getpeminjaman(Request $request)
    {
        if ($request->ajax()) {
            $data = Peminjaman::where('user_id', Auth::user()->id);
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('tanggal', function ($value) {
                    $tanggal = Carbon::parse($value->tanggal)->format('d-m-Y');
                    return $tanggal;
                })
                ->addColumn('tanggal_kembali', function ($value) {
                    $tanggal_kembali = Carbon::parse($value->tanggal_kembali)->format('d-m-Y');
                    return $tanggal_kembali;
                })
                ->addColumn('action', function ($value) {
                    $btn = '<div class="d-flex flex-row bd-highlight mb-3">
                        <a href="' . route('peminjaman.show', $value->id) . '" class="btn btn-warning mr-3">Lihat</i></a>

                        <a class="btn btn-info mr-3" href="' . route('peminjaman.edit', $value->id) . '">Edit</i></a>

                        <button class="btn btn-danger delete" id="' . $value->id . '" nama="' . $value->nama . '" type="submit"
                            onclick="deletePeminjaman(' . $value->id . ')">Hapus</i></button>
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
        $barangs = Inventaris::get();
        return view('peminjaman.create', compact('barangs'), $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        DB::beginTransaction();
        try {
            $request->validate([
                'tanggal' => 'required',
                'nama_peminjam' => 'required',
                'jurusan' => 'required',
                'petugas' => 'required',
                'mengambil' => 'required',
                'tanggal_kembali' => 'required',
                'nama_kegiatan' => 'required',
                'kelas' => 'required',
                'program_studi' => 'required',
                'keterangan' => 'required',
                'mengembalikan' => 'required',
                'menerima' => 'required',
                'keadaan_barang' => 'required',
            ],[
                'tanggal.required' => 'Tanggal Wajib diisi!',
                'nama_peminjam.required' => 'Nama Peminjam Wajib diisi!',
                'jurusan.required' => 'Jurusan Wajib diisi!',
                'petugas.required' => 'Petugas Yang Menyerahkan Wajib diisi!',
                'mengambil.required' => 'Yang Mengambil Wajib diisi!',
                'tanggal_kembali.required' => 'Tanggl Kembali Wajib diisi!',
                'nama_kegiatan' => 'Nama kegiatan Wajib diisi!',
                'kelas' => 'Kelas Wajib diisi!',
                'program_studi' => 'Program Studi Wajib diisi!',
                'keterangan' => 'Keterangan Wajib diisi!',
                'mengembalikan' => 'Yang Mengembalikan Wajib diisi!',
                'menerima' => 'Petugas Yang Menerima Wajib diisi!',
                'keadaan_barang' => 'Keadaan Barang Wajib diisi!',
            ]);

            $peminjaman = new Peminjaman();
            $peminjaman->nama_peminjam = $request->nama_peminjam;
            $peminjaman->tanggal = Carbon::now();
            $peminjaman->jurusan = $request->jurusan;
            $peminjaman->petugas = $request->petugas;
            $peminjaman->mengambil = $request->mengambil;
            $peminjaman->tanggal_kembali = $request->tanggal_kembali;
            $peminjaman->nama_kegiatan = $request->nama_kegiatan;
            $peminjaman->kelas = $request->kelas;
            $peminjaman->program_studi = $request->program_studi;
            $peminjaman->keterangan = $request->keterangan;
            $peminjaman->mengembalikan = $request->mengembalikan;
            $peminjaman->menerima = $request->menerima;
            $peminjaman->user_id = Auth::user()->id;
            $peminjaman->keadaan_barang = $request->keadaan_barang;
            return $peminjaman;
            if ($peminjaman->save()) {
                foreach ($request->kode_barang as $key => $kode_barang) {
                    $barang = Inventaris::where('kode_barang', $kode_barang)->first();
                    if (Auth::user()->level !== 'admin') {
                        if ((int)$barang->kondisi_baru < (int)$request->qty[$key]){
                            return redirect('peminjaman')->with('error', 'Jumlah pinjam melebihi stock tersedia!!');
                        }

                        //update stock barang inventaris
                        $barang->kondisi_baru = $barang->kondisi_baru - $request->qty[$key];
                        $barang->save();
                    }

                    $peminjaman_detail = new PeminjamanDetail;
                    $peminjaman_detail->id_peminjaman = $peminjaman->id;
                    $peminjaman_detail->id_barang = $barang->id;
                    $peminjaman_detail->jumlah = $request->qty[$key];

                    $peminjaman_detail->save();
                }
                DB::commit();
                return redirect('peminjaman')->with('success', 'Tambah Peminjaman Sukses!');
            }
        } catch (Exception $e) {
            DB::rollback();
            return $e->getMessage();
            return redirect('peminjaman')->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $peminjaman = Peminjaman::where('id', $id)->with('details.barang')->first();
        $barangs = Inventaris::get();
        $data['navlink'] = 'peminjaman';
        return view('peminjaman.show', $data, compact('peminjaman', 'barangs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $peminjaman = Peminjaman::where('id', $id)->with('details.barang')->first();
        $barangs = Inventaris::get();
        $data['navlink'] = 'peminjaman';
        return view('peminjaman.edit', $data, compact('peminjaman', 'barangs'));
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

        DB::beginTransaction();
        try {
            $request->validate([
                'tanggal' => 'required',
                'nama_peminjam' => 'required',
                'jurusan' => 'required',
                'petugas' => 'required',
                'mengambil' => 'required',
                'tanggal_kembali' => 'required',
                'nama_kegiatan' => 'required',
                'kelas' => 'required',
                'program_studi' => 'required',
                'keterangan' => 'required',
                'mengembalikan' => 'required',
                'menerima' => 'required',
                'keadaan_barang' => 'required',
            ],[
                'tanggal.required' => 'Tanggal Wajib diisi!',
                'nama_peminjam.required' => 'Nama Peminjam Wajib diisi!',
                'jurusan.required' => 'Jurusan Wajib diisi!',
                'petugas.required' => 'Petugas Yang Menyerahkan Wajib diisi!',
                'mengambil.required' => 'Yang Mengambil Wajib diisi!',
                'tanggal_kembali.required' => 'Tanggl Kembali Wajib diisi!',
                'nama_kegiatan' => 'Nama kegiatan Wajib diisi!',
                'kelas' => 'Kelas Wajib diisi!',
                'program_studi' => 'Program Studi Wajib diisi!',
                'keterangan' => 'Keterangan Wajib diisi!',
                'mengembalikan' => 'Yang Mengembalikan Wajib diisi!',
                'menerima' => 'Petugas Yang Menerima Wajib diisi!',
                'keadaan_barang' => 'Keadaan Barang Wajib diisi!',
            ]);

            $peminjaman = Peminjaman::findOrFail($id);
            $peminjaman->nama_peminjam = $request->nama_peminjam;
            $peminjaman->jurusan = $request->jurusan;
            $peminjaman->petugas = $request->petugas;
            $peminjaman->mengambil = $request->mengambil;
            $peminjaman->tanggal_kembali = $request->tanggal_kembali;
            $peminjaman->nama_kegiatan = $request->nama_kegiatan;
            $peminjaman->kelas = $request->kelas;
            $peminjaman->program_studi = $request->program_studi;
            $peminjaman->keterangan = $request->keterangan;
            $peminjaman->mengembalikan = $request->mengembalikan;
            $peminjaman->menerima = $request->menerima;
            $peminjaman->keadaan_barang = $request->keadaan_barang;
            if ($peminjaman->save()) {
                $delete_id = [];
                foreach ($request->kode_barang as $key => $kode_barang) {
                    $barang = Inventaris::where('kode_barang', $kode_barang)->first();

                    $delete_id[] = $barang->id;
                    $peminjaman_detail = PeminjamanDetail::where([['id_peminjaman',$peminjaman->id],['id_barang',$barang->id]])->first();

                    if (Auth::user()->level !== 'admin') {
                        if ((int)$request->qty[$key] > (int)$peminjaman_detail->jumlah) {
                            $selisih = $request->qty[$key] - $peminjaman_detail->jumlah;
                            if ((int)$barang->kondisi_baru < (int)$selisih)
                                return redirect('peminjaman')->with('error', 'Jumlah pinjam melebihi stock tersedia!!');

                            $barang->kondisi_baru = $barang->kondisi_baru - $selisih;
                        } else {
                            $selisih = $peminjaman_detail->jumlah - $request->qty[$key];
                            $barang->kondisi_baru = $barang->kondisi_baru + $selisih;
                        }
                        $barang->save();
                    }

                    $peminjaman_detail->jumlah = $request->qty[$key];
                    $peminjaman_detail->save();
                }
                PeminjamanDetail::where('id_peminjaman',$id)
                ->whereNotIn('id_barang',$delete_id)
                ->forceDelete();
                DB::commit();
                return redirect('peminjaman')->with('success', 'Edit Peminjaman Sukses!');
            }
        } catch (Exception $e) {
            Db::rollback();
            // return $e;
            return redirect('peminjaman')->with('error', $e->getMessage());
        }
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
        $peminjamanDetails = PeminjamanDetail::where('id_peminjaman', $id)->get();
        foreach($peminjamanDetails as $peminjamanDetail){
            // Update stok pada tabel barang
            $barang = Inventaris::where('id', $peminjamanDetail->id_barang)->first();
            $barang->kondisi_baru = $barang->kondisi_baru + $peminjamanDetail->jumlah;
            $barang->save();
        }

        // Hapus semua peminjaman detail terkait
        PeminjamanDetail::where('id_peminjaman', $id)->delete();
        // Hapus peminjaman
        $peminjaman->delete();
        return $id;
    }
}
