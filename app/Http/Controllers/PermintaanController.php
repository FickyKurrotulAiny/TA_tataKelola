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
use Illuminate\Support\Facades\Auth;
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
            if (Auth::user()->level === 'user') {
                $data = Permintaan::where('user_id', Auth::user()->id);
            } else {
                $data = Permintaan::query();
            }
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

        DB::beginTransaction();
        try {
            $request->validate([
                'tanggal' => 'required',
                'nama_dosen' => 'required',
                'mata_kuliah' => 'required',
                'kelas' => 'required',
                'keterangan' => 'required',
            ],[
                'tanggal.required' => 'Tanggal Wajib diisii!',
                'nama_dosen.required' => 'Nama Dosen Wajib diisii!',
                'mata_kuliah.required' => 'Mata kuliah Wajib diisii!',
                'kelas.required' => 'Kelas Wajib diisii!',
                'keterangan.required' => 'Keterangan Wajib diisii!',
            ]);

            $permintaan = new Permintaan();
            $permintaan->tanggal = Carbon::now();
            $permintaan->nama_dosen = $request->nama_dosen;
            $permintaan->mata_kuliah = $request->mata_kuliah;
            $permintaan->kelas = $request->kelas;
            $permintaan->keterangan = $request->keterangan;
            $permintaan->user_id = Auth::user()->id;

            if($permintaan->save()){
                foreach($request->id_bahan as $key=>$id_bahan){
                    $barang = Persediaan::where('id', $id_bahan)->first();
                    if ((int)$barang->jumlah < (int)$request->qty[$key])
                        return redirect('permintaan')->with('error', 'Jumlah permintaan melebihi stock tersedia!!');

                    $permintaan_detail = new PermintaanDetail;
                    $permintaan_detail->id_permintaan = $permintaan->id;
                    $permintaan_detail->id_barang = $barang->id;
                    $permintaan_detail->jumlah = $request->qty[$key];
                    $permintaan_detail->save();

                    //update stock barang inventaris
                    $barang->jumlah = $barang->jumlah - $request->qty[$key];
                    $barang->save();
                }
                DB::commit();
                return redirect('permintaan')->with('success', 'Tambah Permintaan Sukses!');
            }
        } catch (Exception $e) {
            DB::rollback();
            // return $e->getMessage();
            return redirect('permintaan')->with('error', $e->getMessage());
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
        $permintaan = Permintaan::where('id',$id)->with('details.barang')->first();
        $data['navlink'] = 'permintaan';
        $barangs = Persediaan::get();

        return view('permintaan.show', $data, compact('permintaan'));
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
        $barangs = Persediaan::get();
        return view('permintaan.edit', $data, compact('permintaan','barangs'));
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
                'nama_dosen' => 'required',
                'mata_kuliah' => 'required',
                'kelas' => 'required',
                'keterangan' => 'required',
            ],[
                'tanggal.required' => 'Tanggal Wajib diisii!',
                'nama_dosen.required' => 'Nama Dosen Wajib diisii!',
                'mata_kuliah.required' => 'Mata kuliah Wajib diisii!',
                'kelas.required' => 'Kelas Wajib diisii!',
                'keterangan.required' => 'Keterangan Wajib diisii!',
            ]);

            $permintaan = Permintaan::findOrFail($id);

            $permintaan->tanggal = Carbon::now();
            $permintaan->nama_dosen = $request->nama_dosen;
            $permintaan->mata_kuliah = $request->mata_kuliah;
            $permintaan->kelas = $request->kelas;
            $permintaan->keterangan = $request->keterangan;
            $permintaan->user_id = Auth::user()->id;

            if($permintaan->save()){
                PermintaanDetail::where('id_permintaan',$id)->delete();

                $delete_id = [];
                foreach($request->id_barang as $key=>$id_barang){

                    $barang = Persediaan::where('id', $id_barang)->first();

                    $delete_id[] = $barang->id;
                    $permintaan_detail = PermintaanDetail::where([['id_permintaan',$permintaan->id],['id_barang',$barang->id]])->first();

                    if ((int)$request->qty[$key] > (int)$permintaan_detail->jumlah) {
                        $selisih = $request->qty[$key] - $permintaan_detail->jumlah;
                        if ((int)$barang->jumlah < (int)$selisih)
                            return redirect('permintaan')->with('error', 'Jumlah permintaan melebihi stock tersedia!!');

                        $barang->jumlah = $barang->jumlah - $selisih;
                    } else {
                        $selisih = $permintaan_detail->jumlah - $request->qty[$key];
                        $barang->jumlah = $barang->jumlah + $selisih;
                    }

                    $permintaan_detail->jumlah = $request->qty[$key];
                    $permintaan_detail->save();

                    // return $permintaan_detail;
                }
                PermintaanDetail::where('id_permintaan',$id)
                ->whereNotIn('id_barang',$delete_id)
                ->forceDelete();
                DB::commit();
                return redirect('permintaan')->with('success', 'Update Permintaan Sukses!');
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
        $permintaanDetails = PermintaanDetail::where('id_permintaan', $id)->get();
        foreach($permintaanDetails as $permintaanDetail){
            // Update stok pada tabel barang
            $barang = Persediaan::where('id', $permintaanDetail->id_barang)->first();
            $barang->jumlah = $barang->jumlah + $permintaanDetail->jumlah;
            $barang->save();
        }

        // Hapus semua permintaan detail terkait
        PermintaanDetail::where('id_permintaan', $id)->delete();
        // Hapus permintaan
        $permintaan->delete();
        return $id;
    }
}
