<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persediaan;
use Yajra\DataTables\DataTables;

class PersediaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $data['navlink'] = 'persediaan';
        return view('barang.persediaan.index', $data, compact('request'));
    }

    public function getpersediaan(Request $request){
        if ($request->ajax()) {
            $data = Persediaan::select('*');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($value){
                    $btn = '<div class="d-flex flex-row bd-highlight mb-3">
                        <a href="'.route('persediaan.show', $value->id).'" class="btn btn-warning mr-3">Lihat</i></a>

                        <a class="btn btn-info mr-3" href="'.route('persediaan.edit', $value->id).'">Edit</i></a>

                        <button class="btn btn-danger delete" id="'.$value->id.'" nama="'.$value->nama.'" type="submit"
                            onclick="deletePersediaan('.$value->id.')">Hapus</i></button>
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
        $data['navlink'] = 'persediaan';
        return view('barang.persediaan.create', $data);
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
            'nama_barang' => 'required',
            'merk' => 'required',
            'satuan' => 'required',
            'tahun_peroleh'=> 'required',
            'volumeBarang_saldo' => 'required',
            'volumeBarang_masuk' => 'required',
            'volumeBarang_keluar' => 'required',
            'volumeBarang_sisa' => 'required',
            'harga_satuan' => 'required',
            'jumlah' => 'required',
            'image' => 'required | image|file|max:1024',
            'jumlah_barang' => 'required',
        ],[
            'nama_barang.required' => 'Nama Barang Wajib diisi!',
            'merk.required' => 'Merk/Type Wajib diisi!',
            'satuan.required' => 'Satuan Barang Wajib diisi!',
            'tahun_peroleh'=>'Tahun Peroleh Wajib diisi',
            'volumeBarang_saldo.required' => 'Volume Barang (Saldo Awal) Wajib diisi!',
            'volumeBarang_masuk.required' => 'Volume Barang (Masuk) Wajib diisi',
            'volumeBarang_keluar.required' => 'Volume Barang (Keluar) Wajib diisi',
            'volumeBarang_sisa.required' => 'Volume Barang (Sisa) Wajib diisi',
            'harga_satuan.required' => 'Harga Satuan Wajib diisi',
            'jumlah.required' => 'Jumlah Wajib diisi!',
            'image.required' => 'Image Wajib diisi!',
            'jumlah_barang.required' => 'Jumlah Barang Wajib diisii!',
        ]);

        $persediaan = new Persediaan();
        $persediaan = Persediaan::create($request->all());
        if($request->hasFile('image')){
            $request->file('image')->move('imagepersediaan/', $request->file('image')->getClientOriginalName());
            $persediaan->image = $request->file('image')->getClientOriginalName();
            $persediaan->save();
        }

        $persediaan->nama_barang = $request->nama_barang;
        $persediaan->merk = $request->merk;
        $persediaan->satuan = $request->satuan;
        $persediaan->tahun_peroleh = $request->tahun_peroleh;
        $persediaan->volumeBarang_saldo = $request->volumeBarang_saldo;
        $persediaan->volumeBarang_masuk = $request->volumeBarang_masuk;
        $persediaan->volumeBarang_keluar = $request->volumeBarang_keluar;
        $persediaan->volumeBarang_sisa = $request->volumeBarang_sisa;
        $persediaan->harga_satuan = $request->harga_satuan;
        $persediaan->jumlah = $request->jumlah;
        $persediaan->jumlah_barang = $request->jumlah_barang;
        $persediaan->save();

        return redirect('persediaan')->with('success', 'Tambah Persediaan Sukses!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $persediaan = Persediaan::findOrFail($id);
        $data['navlink'] = 'persediaan';
        return view('barang.persediaan.show', $data, ['persediaan' => $persediaan]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $persediaan = Persediaan::findOrFail($id);
        $data['navlink'] = 'persediaan';
        return view('barang.persediaan.edit', $data, compact('persediaan'));
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
        $persediaan = Persediaan::findOrFail($id);
        if($request->hasFile('image')){
            $request->file('image')->move('imagepersediaan/', $request->file('image')->getClientOriginalName());
            $persediaan->image = $request->file('image')->getClientOriginalName();
            $persediaan->save();
        }

        $persediaan->nama_barang = $request->nama_barang;
        $persediaan->merk = $request->merk;
        $persediaan->satuan = $request->satuan;
        $persediaan->tahun_peroleh = $request->tahun_peroleh;
        $persediaan->volumeBarang_saldo = $request->volumeBarang_saldo;
        $persediaan->volumeBarang_masuk = $request->volumeBarang_masuk;
        $persediaan->volumeBarang_keluar = $request->volumeBarang_keluar;
        $persediaan->volumeBarang_sisa = $request->volumeBarang_sisa;
        $persediaan->harga_satuan = $request->harga_satuan;
        $persediaan->jumlah = $request->jumlah;
        $persediaan->jumlah_barang = $request->jumlah_barang;
        $persediaan->save();

        return redirect('persediaan')->with('success', 'Edit persediaan Sukses!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $persediaan = Persediaan::find($id);
        $persediaan->delete();
        return $id;
    }
}
