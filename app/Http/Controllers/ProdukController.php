<?php

namespace App\Http\Controllers;

use App\Models\ProdukModel;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class ProdukController extends Controller
{

    public function getprodukbyid($kode)
    {
        // Lakukan logika untuk mengambil informasi harga barang satuan berdasarkan $kode
        // Misalnya, melakukan query ke database untuk mendapatkan data produk berdasarkan $kode
        $produk = ProdukModel::where('kode', $kode)->first();

        // Jika produk dengan $kode ditemukan, kirimkan respons JSON dengan informasi harga
        if ($produk) {
            $harga = $produk->harga;
            return response()->json(['harga' => $harga]);
        }

        // Jika produk dengan $kode tidak ditemukan, kirimkan respons JSON dengan pesan error
        return response()->json(['error' => 'Produk tidak ditemukan'], 404);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $id = IdGenerator::generate([
            'table' => 'produk',
            'field' => 'kode',
            'length' => 4,
            'prefix' => 'KD-'
        ]);

        $data = [
            'data' => ProdukModel::all(),
            'id' => $id
        ];

        return view('admin.produk.index', $data);
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
        $request->validate([
            'name' => 'required|unique:produk,name',
            'harga' => 'required|min:3'
        ], [
            'name.required' => 'nama produk tidak boleh kosong !',
            'name.unique' => 'nama produk sudah ada !',
            'harga.required' => 'harga produk tidak boleh kosong !',
            'harga.min' => 'harga produk minimal 3 digit (misal. 1000) !',
        ]);

        $data = [
            'name' => $request->name,
            'harga' => $request->harga,
            'kode' => $request->kode,
        ];
        ProdukModel::create($data);
        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil di tambahkan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProdukModel  $produkModel
     * @return \Illuminate\Http\Response
     */
    public function show(ProdukModel $produkModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProdukModel  $produkModel
     * @return \Illuminate\Http\Response
     */
    public function edit(ProdukModel $produkModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProdukModel  $produkModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'nameedit' => 'required|unique:produk,name',
            'hargaedit' => 'required|min:3'
        ], [
            'nameedit.required' => 'nama produk tidak boleh kosong !',
            'nameedit.unique' => 'nama produk sudah ada !',
            'hargaedit.required' => 'harga produk tidak boleh kosong !',
            'hargaedit.min' => 'harga produk minimal 3 digit (misal. 1000) !',
        ]);

        $data = [
            'name' => $request->nameedit,
            'harga' => $request->hargaedit,
            'kode' => $request->kodeedit,
        ];
        ProdukModel::where('id', $id)->update($data);
        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil di update !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProdukModel  $produkModel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        ProdukModel::where('id', $id)->delete();
        return redirect()->route('admin.produk.index')->with('success', 'Berhasil delete data!');
    }
}
