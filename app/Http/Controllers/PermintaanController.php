<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Yajra\DataTables\DataTables;
use App\Models\Permintaan;
use App\Models\Persediaan;
use App\Models\PermintaanDetail;
use PDF;
use Exception;
use Illuminate\Support\Facades\DB;

class PermintaanController extends Controller
{

    public function generatePDFPermintaan(Request $request, $id)
    {
            $permintaan = Permintaan::find($id);
            $data['navlink'] = 'permintaan';
            $pdf = PDF::loadview('permintaan.form_permintaan', ['permintaan'=>$permintaan]);
            return $pdf->stream('permintaan.pdf');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $data['navlink'] = 'permintaan';
        return view('permintaan.index', $data, compact('request'));
    }

    public function getpermintaan(Request $request){
        if ($request->ajax()) {
            $data = Permintaan::select('*');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('tanggal', function($value){
                        $tanggal = Carbon::parse($value->tanggal)->format('d-m-Y');
                        return $tanggal;
                    })
                    ->addColumn('action', function($value){
                    $btn = '<div class="d-flex flex-row bd-highlight mb-3">
                        <a href="'.route('permintaan.show', $value->id).'" class="btn btn-warning mr-3">Lihat</i></a>

                        <a class="btn btn-info mr-3" href="'.route('permintaan.edit', $value->id).'">Edit</i></a>

                        <button class="btn btn-danger delete" id="'.$value->id.'" nama="'.$value->nama.'" type="submit"
                            onclick="deletePermintaan('.$value->id.')">Hapus</i></button>
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
        $data['navlink'] = 'permintaan';
        $barangs = Persediaan::get();
        return view('permintaan.create', compact('barangs'), $data);
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
        'nama_dosen' => 'required',
        'mata_kuliah' => 'required',
        'kelas' => 'required',
        'satuan' => 'required',
        'keterangan' => 'required',
        ],[
        'tanggal.required' => 'Tanggal Wajib diisii!',
        'nama_dosen.required' => 'Nama Dosen Wajib diisii!',
        'mata_kuliah.required' => 'Mata kuliah Wajib diisii!',
        'kelas.required' => 'Kelas Wajib diisii!',
        'satuan.required' => 'Satuan Wajib diisii!',
        'keterangan.required' => 'Keterangan Wajib diisii!',
        ]);

        DB::beginTransaction();
        try {
            $permintaan = new Permintaan();
            $permintaan->tanggal = $request->tanggal;
            $permintaan->nama_dosen = $request->nama_dosen;
            $permintaan->mata_kuliah = $request->mata_kuliah;
            $permintaan->kelas = $request->kelas;
            $permintaan->satuan = $request->satuan;
            $permintaan->keterangan = $request->keterangan;
            if($permintaan->save()){
                foreach($request->nama_bahan as $key=>$nama_bahan){
                    $barang = Persediaan::where('nama_bahan', $nama_bahan)->first();
                    $permintaan_detail = new PermintaanDetail;
                    $permintaan_detail->id_permintaan = $permintaan->id;
                    $permintaan_detail->id_barang = $barang->id;
                    $pinjam_detail->jumlah = $request->qty[$key];
                    $permintaan_detail->save();
                }
            }
        } catch (Exception $e) {
            DB::rollback();
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
        $permintaan = Permintaan::findOrFail($id);
        $pinjam = Pinjam::where('id',$id)->with('details.barang')->first();
        $data['navlink'] = 'permintaan';
        return view('permintaan.show', $data, ['permintaan' => $permintaan]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permintaan = Permintaan::findOrFail($id);
        $data['navlink'] = 'permintaan';
        return view('permintaan.edit', $data, compact('permintaan'));
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
        'jumlah' => 'required',
        'satuan' => 'required',
        'keterangan' => 'required',
        ],[
        'tanggal.required' => 'Tanggal Wajib diisii!',
        'nama_dosen.required' => 'Nama Dosen Wajib diisii!',
        'mata_kuliah.required' => 'Mata kuliah Wajib diisii!',
        'kelas.required' => 'Kelas Wajib diisii!',
        'jumlah.required' => 'Jumlah Wajib diisii!',
        'satuan.required' => 'Satuan Wajib diisii!',
        'keterangan.required' => 'Keterangan Wajib diisii!',
        ]);

        DB::beginTransaction();
        try {
            $permintaan = Permintaan::findOrFail($id);

            $permintaan->tanggal = $request->tanggal;
            $permintaan->nama_dosen = $request->nama_dosen;
            $permintaan->mata_kuliah = $request->mata_kuliah;
            $permintaan->kelas = $request->kelas;
            $permintaan->jumlah = $request->jumlah;
            $permintaan->satuan = $request->satuan;
            $permintaan->keterangan = $request->keterangan;
            if($permintaan->save()){
                PermintaanDetail::where('id_peminjaman', $id)->delete();
                foreach($request->nama_bahan as $key=>$nama_bahan){
                    $barang = Persediaan::where('nama_bahan', $nama_bahan)->first();

                    $permintaan_detail = new PermintaanDetail;
                    $permintaan_detail->id_permintaan = $permintaan->id;
                    $permintaan_detail->id_barang = $barang->id;
                    $permintaan_detail->save();
                }
                DB::commit();
                return redirect('permintaan')->with('success', 'Edit Permintaan Sukses!');
            }
        } catch (Exception $e) {
            DB::rollback();
            return redirect('permintaan')->with('error', $e->getMessage());
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
        $permintaan = Permintaan::find($id);
        $permintaan->delete();
        return $id;
    }
}