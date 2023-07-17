<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Yajra\DataTables\DataTables;
use App\Models\Minta;
use App\Models\Persediaan;
use App\Models\MintaDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MintaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $data['navlink'] = 'minta';
        return view('minta.index', $data, compact('request'));
    }

    public function getminta(Request $request){
        if ($request->ajax()) {
            $data = Minta::select('*');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('tanggal', function($value){
                        $tanggal = Carbon::parse($value->tanggal)->format('d-m-Y');
                        return $tanggal;
                    })
                    ->addColumn('action', function($value){
                    $btn = '<div class="d-flex flex-row bd-highlight mb-3">
                        <a href="'.route('minta.show', $value->id).'" class="btn btn-warning mr-3">Lihat</i></a>

                        <a class="btn btn-info mr-3" href="'.route('minta.edit', $value->id).'">Edit</i></a>

                        <button class="btn btn-danger delete" id="'.$value->id.'" nama="'.$value->nama.'" type="submit"
                            onclick="deleteMinta('.$value->id.')">Hapus</i></button>
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
        $data['navlink'] = 'minta';
        $barangs = Persediaan::get();
        return view('minta.create', compact('barangs'), $data);
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
        dd($request->all());
        try {
            $request->validate([
            'tanggal' => 'required',
            'nama_dosen' => 'required',
            'mata_kuliah' => 'required',
            'kelas' => 'required',
            'keterangan' => 'required',
            'mengambil' => 'required',
            'petugas' => 'required',
            ],[
            'tanggal.required' => 'Tanggal Wajib diisii!',
            'nama_dosen.required' => 'Nama Dosen Wajib diisii!',
            'mata_kuliah.required' => 'Mata kuliah Wajib diisii!',
            'kelas.required' => 'Kelas Wajib diisii!',
            'keterangan.required' => 'Keterangan Wajib diisii!',
            'mengambil.required' => 'Yang Mengambil Wajib diisi',
            'petugas.required' => 'Petugas Yang Memberikan',
            ]);

        $minta = new Minta();
        $minta->tanggal = $request->tanggal;
        $minta->nama_dosen = $request->nama_dosen;
        $minta->mata_kuliah = $request->mata_kuliah;
        $minta->kelas = $request->kelas;
        $minta->keterangan = $request->keterangan;
        $minta->mengambil = $request->mengambil;
        $minta->petugas = $request->petugas;
        if($minta->save()){
            foreach($request->id_bahan as $key=>$id_bahan){
                    $barang = Persediaan::where('id', $id_bahan)->first();
                    $minta_detail = new MintaDetail;
                    $minta_detail->id_minta = $minta->id;
                    $minta_detail->id_barang = $barang->id;
                    $minta_detail->jumlah = $request->qty[$key];
                    $minta_detail->save();

                    //update stock barang inventaris
                    $barang->jumlah = $barang->jumlah - $request->qty[$key];
                    $barang->save();
                }
                DB::commit();
                return redirect('minta')->with('success', 'Tambah Permintaan Sukses!');
            }
        } catch (Exception $e) {
            DB::rollback();
            // return $e->getMessage();
            return redirect('minta')->with('error', $e->getMessage());
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
        $minta = Minta::where('id', $id)->with('details.barang')->first();
        $data['navlink'] = 'minta';
        $barangs = Persediaan::get();

        return view('minta.show', $data, compact('minta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $minta = Minta::where('id', $id)->with('details.barang')->first();
        $data['navlink'] = 'minta';
        $barangs = Persediaan::get();
        return view('minta.edit', $data, compact('minta', 'barangs'));
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
        $request->validate([
            'tanggal' => 'required',
            'nama_dosen' => 'required',
            'mata_kuliah' => 'required',
            'kelas' => 'required',
            'nama_bahan' => 'required',
            'jumlah' => 'required',
            'satuan' => 'required',
            'keterangan' => 'required',
            'mengambil' => 'required',
            'petugas' => 'required',
            ],[
            'tanggal.required' => 'Tanggal Wajib diisii!',
            'nama_dosen.required' => 'Nama Dosen Wajib diisii!',
            'mata_kuliah.required' => 'Mata kuliah Wajib diisii!',
            'kelas.required' => 'Kelas Wajib diisii!',
            'nama_bahan.required' => 'Nama Bahan Wajib diisii!',
            'jumlah.required' => 'Jumlah Wajib diisii!',
            'satuan.required' => 'Satuan Wajib diisii!',
            'keterangan.required' => 'Keterangan Wajib diisii!',
            'mengambil.required' => 'Yang Mengambil Wajib diisi',
            'petugas.required' => 'Petugas Yang Memberikan',
            ]);

        DB::beginTransaction();
        try {

        $minta = Minta::findOrFail($id);
        $minta->tanggal = $request->tanggal;
        $minta->nama_dosen = $request->nama_dosen;
        $minta->mata_kuliah = $request->mata_kuliah;
        $minta->kelas = $request->kelas;
        $minta->nama_bahan = $request->nama_bahan;
        $minta->satuan = $request->satuan;
        $minta->keterangan = $request->keterangan;
        $minta->mengambil = $request->mengambil;
        $minta->petugas = $request->petugas;
        if($minta->save()){
            MintaDetail::where('id_minta', $id)->delete();
            foreach($request->id_barang as $key=>$id_barang){
                    $barang = Persediaan::where('id', $id_barang)->first();
                    $dele_id[] = $barang->id;
                    $minta_detail = MintaDetail::where([['id_minta', $minta->id], 'id_barang', $barang->id])->first();

                    if ((int)$request->qty[$key] > (int)$minta_detail->jumlah){
                        $selisih = $minta_detail->qty[$key] - $minta_detail->jumlah;
                        if ((int)$barang->jumlah < (int)$selisih)
                        return redirect('minta')->with('error', 'Jumlah Permintaan Melebihi stock tersedia!!');
                        $barang->jumlah = $barang->jumlah - $selisih;
                    } else {
                        $selisih = $permintaan_detail->jumlah - $request->qty[$key];
                        $barang->jumlah = $barang->jumlah + $selisih;
                    }

                    $minta_detail->jumlah = $request->qty[$key];
                    $minta_detail->save();
                }
                MintaDetail::where('id_minta',$id)
                ->whereNotIn('id_barang', $dele_id)
                ->forcedDelete();
                DB::commit();
                return redirect('minta')->with('success', 'Tambah Permintaan Sukses!');
            }
        } catch (Exception $e) {
            DB::rollback();
            // return $e->getMessage();
            return redirect('minta')->with('error', $e->getMessage());
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
        $minta = Minta::find($id);
        $minta->delete();
        return $id;
    }
}
