<?php

namespace App\Http\Controllers;

use App\Models\QtyModel;
use Illuminate\Http\Request;

class QtyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = [
            'qty' => QtyModel::orderBy('name', 'desc')->paginate(5),
        ];
        return view('admin.kategori.qty', $data);
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
            'qty' => 'required|unique:qty,name',
        ], [
            'qty.required' => 'nama qty tidak boleh kosong !',
            'qty.unique' => 'nama qty ' . $request->qty . ' sudah ada !',
        ]);

        $data = [
            'name' => $request->qty
        ];

        QtyModel::create($data);

        return redirect()->route('admin.kategori.qty.index')->with('success', 'Berhasil menambahkan data qty !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\QtyModel  $qtyModel
     * @return \Illuminate\Http\Response
     */
    public function show(QtyModel $qtyModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\QtyModel  $qtyModel
     * @return \Illuminate\Http\Response
     */
    public function edit(QtyModel $qtyModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\QtyModel  $qtyModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'qtyedit' => 'required|unique:qty,name',
        ], [
            'qtyedit.required' => 'nama qty tidak boleh kosong !',
            'qtyedit.unique' => 'nama qty ' . $request->qtyedit . ' sudah ada !',
        ]);

        $data = [
            'name' => $request->qtyedit
        ];

        QtyModel::where('id', $id)->update($data);

        return redirect()->route('admin.kategori.qty.index')->with('success', 'Berhasil update data qty !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QtyModel  $qtyModel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        QtyModel::where('id', $id)->delete();
        return redirect()->route('admin.kategori.qty.index')->with('success', 'Berhasil delete data qty !');
    }
}
