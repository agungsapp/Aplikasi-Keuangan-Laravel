<?php

namespace App\Http\Controllers;

use App\Models\KategoriModel;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get data 
        $data = [
            'kategori' => KategoriModel::orderBy('kategori', 'desc')->paginate(5),
        ];
        return view('admin.kategori.index', $data);
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
        // simpan kategori

        $request->validate([
            'kategori' => 'required|unique:kategori,kategori',
        ], [
            'kategori.required' => 'nama kategori tidak boleh kosong !',
            'kategori.unique' => 'nama kategori ' . $request->kategori . ' sudah ada !',
        ]);

        $data = [
            'kategori' => $request->kategori
        ];

        KategoriModel::create($data);

        return redirect()->route('admin.kategori.index')->with('success', 'Berhasil menambahkan data !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KategoriModel  $kategoriModel
     * @return \Illuminate\Http\Response
     */
    public function show(KategoriModel $kategoriModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KategoriModel  $kategoriModel
     * @return \Illuminate\Http\Response
     */
    public function edit(KategoriModel $kategoriModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KategoriModel  $kategoriModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'kategoriedit' => 'required|unique:kategori,kategori',
        ], [
            'kategoriedit.required' => 'nama kategori tidak boleh kosong !',
            'kategoriedit.unique' => 'nama kategori ' . $request->kategoriedit . ' sudah ada !',
        ]);

        $data = [
            'kategori' => $request->kategoriedit,
        ];
        KategoriModel::where('id', $id)->update($data);
        // KategoriModel::where('id', $request->id)->update($data);

        return redirect()->route('admin.kategori.index')->with('success', 'Berhasil update data !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KategoriModel  $kategoriModel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        KategoriModel::where('id', $id)->delete();
        return redirect()->route('admin.kategori.index')->with('success', 'Berhasil delete data!');
    }
}
