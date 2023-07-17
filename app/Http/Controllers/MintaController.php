<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Yajra\DataTables\DataTables;
use App\Models\Minta;

class MintaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['navlink'] = 'minta';
        return view('minta.index', $data, compact('request'));
    }

    public function getminta(Request $request)
    {
        if ($request->ajax()) {
            $data = Minta::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('tanggal', function ($value) {
                    $tanggal = Carbon::parse($value->tanggal)->format('d-m-Y');
                    return $tanggal;
                })
                ->addColumn('action', function ($value) {
                    $btn = '<div class="d-flex flex-row bd-highlight mb-3">
                        <a href="' . route('minta.show', $value->id) . '" class="btn btn-warning mr-3">Lihat</i></a>

                        <a class="btn btn-info mr-3" href="' . route('minta.edit', $value->id) . '">Edit</i></a>

                        <button class="btn btn-danger delete" id="' . $value->id . '" nama="' . $value->nama . '" type="submit"
                            onclick="deleteMinta(' . $value->id . ')">Hapus</i></button>
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
        return view('minta.create', $data);
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
            'nama_bahan' => 'required',
            'jumlah' => 'required',
            'satuan' => 'required',
            'keterangan' => 'required',
            'mengambil' => 'required',
            'petugas' => 'required',
        ], [
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

        $minta = new Minta();
        $minta = Minta::create($request->all());

        $minta->tanggal = $request->tanggal;
        $minta->nama_dosen = $request->nama_dosen;
        $minta->mata_kuliah = $request->mata_kuliah;
        $minta->kelas = $request->kelas;
        $minta->nama_bahan = $request->nama_bahan;
        $minta->jumlah = $request->jumlah;
        $minta->satuan = $request->satuan;
        $minta->keterangan = $request->keterangan;
        $minta->mengambil = $request->mengambil;
        $minta->petugas = $request->petugas;
        $minta->save();

        return redirect('minta')->with('success', 'Tambah Permintaan Sukses!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $minta = Minta::findOrFail($id);
        $data['navlink'] = 'minta';
        return view('minta.show', $data, ['minta' => $minta]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $minta = Minta::findOrFail($id);
        $data['navlink'] = 'minta';
        return view('minta.edit', $data, compact('minta'));
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
        $minta = Minta::findOrFail($id);

        $minta->tanggal = $request->tanggal;
        $minta->nama_dosen = $request->nama_dosen;
        $minta->mata_kuliah = $request->mata_kuliah;
        $minta->kelas = $request->kelas;
        $minta->nama_bahan = $request->nama_bahan;
        $minta->jumlah = $request->jumlah;
        $minta->satuan = $request->satuan;
        $minta->keterangan = $request->keterangan;
        $minta->mengambil = $request->mengambil;
        $minta->petugas = $request->petugas;
        $minta->save();

        return redirect('minta')->with('success', 'Edit Permintaan Sukses!');
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
