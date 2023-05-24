<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pinjam;
use Carbon\Carbon;
use Yajra\DataTables\DataTables;
use PDF;


class PinjamController extends Controller
{

    public function generatePDFPinjam(Request $request)
    {
        // $pinjam = Pinjam::all();
        $pinjam = Pinjam::all();
        $pdf = PDF::loadview('pinjam.form_peminjaman', compact('pinjam'));
        // return $pdf->stream('Form_peminjaman PDF.pdf');
        // return ('Form_peminjaman PDF.pdf', compact('pinjam'));
        return $pdf->stream('form_peminjaman.pdf', ['pinjam' => $pinjam]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $data['navlink'] = 'pinjam';
        return view('pinjam.index', $data, compact('request'));
    }

    public function getpinjam(Request $request){
        if ($request->ajax()) {
            $data = Pinjam::select('*');
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
                    <a href="'.route('pinjam.show', $value->id).'"
                        class="btn btn-warning btn-sm">Lihat&nbsp;</a>&nbsp;&nbsp;

                    <a class="btn btn-info btn-sm"
                        href="'.route('pinjam.edit', $value->id).'"><i
                            class="fas fa-pen"></i>&nbsp;</a>&nbsp;&nbsp;

                    <button class="btn btn-danger delete" id="'.$value->id.'"
                        nama="'.$value->nama.'" type="submit" onclick="deletePinjam('.$value->id.')"><i
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
        $data['navlink'] = 'pinjam';
        return view('pinjam.create', $data);
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

            'nama_dosen' => 'required',
            'jurusan' => 'required',
            'program_studi' => 'required',
            'nama_kegiatan' => 'required',
            'tanggal' => 'required',
            'tanggal_kembali' => 'required',
            'nama_barang' => 'required',
            'tahun_peroleh' => 'required',
            'jumlah' => 'required',
            'keterangan' => 'required',
        ],[
            'nama_dosen.required' => 'Nama Dosen Wajib diisi!',
            'jurusan.required'  => 'Jurusan Wajib diisi!',
            'program_studi.required'  => 'Program Studi Wajib diisi!',
            'nama_kegiatan.required'  => 'Nama Kegiatan Wajib diisi!',
            'tanggal.required'  => 'Tanggal Wajib diisi!',
            'tanggal_kembali.required'  => 'Tanggal Kembali Wajib diisi!',
            'nama_barang.required'  => 'Nama Barang Wajib diisi!',
            'tahun_peroleh.required'  => 'Tahun Peroleh Wajib diisi!',
            'jumlah.required'  => 'Jumlah Wajib diisi!',
            'keterangan.required'  => 'Keterangan Wajib diisi!',
        ]);

        $pinjam = new Pinjam();
        $pinjam = Pinjam::create($request->all());

        $pinjam->nama_dosen = $request->nama_dosen;
        $pinjam->jurusan = $request->jurusan;
        $pinjam->program_studi = $request->program_studi;
        $pinjam->nama_kegiatan = $request->nama_kegiatan;
        $pinjam->tanggal = $request->tanggal;
        $pinjam->tanggal_kembali = $request->tanggal_kembali;
        $pinjam->nama_barang = $request->nama_barang;
        $pinjam->tahun_peroleh = $request->tahun_peroleh;
        $pinjam->jumlah = $request->jumlah;
        $pinjam->keterangan = $request->keterangan;
        $pinjam->save();

        return redirect('pinjam')->with('success', 'Tambah Pinjam Sukses!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pinjam = Pinjam::findOrFail($id);
        $data['navlink'] = 'pinjam';
        return view('pinjam.show', $data, ['pinjam' => $pinjam]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pinjam = Pinjam::findOrFail($id);
        $data['navlink'] = 'pinjam';
        return view('pinjam.edit', $data, compact('pinjam'));
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
        $pinjam = Pinjam::findOrFail($id);
        $pinjam->nama_dosen = $request->nama_dosen;
        $pinjam->jurusan = $request->jurusan;
        $pinjam->program_studi = $request->program_studi;
        $pinjam->nama_kegiatan = $request->nama_kegiatan;
        $pinjam->tanggal = $request->tanggal;
        $pinjam->tanggal_kembali = $request->tanggal_kembali;
        $pinjam->nama_barang = $request->nama_barang;
        $pinjam->tahun_peroleh = $request->tahun_peroleh;
        $pinjam->jumlah = $request->jumlah;
        $pinjam->keterangan = $request->keterangan;
        $pinjam->save();

        return redirect('pinjam')->with('success', 'Edit Pinjam Sukses!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pinjam = Pinjam::find($id);
        $pinjam->delete();
        return $id;
    }
}
