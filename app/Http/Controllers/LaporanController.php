<?php

namespace App\Http\Controllers;

use App\Models\penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use PDF;

class LaporanController extends Controller
{

    public function exportPDF()
    {
        $data = DB::table('penjualan')
            ->join('detail_transaksi', 'penjualan.kode_trx', '=', 'detail_transaksi.kode_trx')
            ->orderBy('penjualan.nama_customer')
            ->select('penjualan.nama_customer', 'detail_transaksi.*')
            ->get()
            ->groupBy('nama_customer')
            ->map(function ($items) {
                $items = $items->toArray();
                $rowspan = count($items);
                $no = 1;
                foreach ($items as &$item) {
                    $item->rowspan = $rowspan;
                    $item->no = $no++;
                }
                return $items;
            })
            ->flatten();

        $pdf = PDF::loadview('staff.laporan.export', compact('data'));

        return $pdf->download('laporan.pdf');

        // return view('staff.laporan.export', compact('data'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = DB::table('penjualan')
            ->join('detail_transaksi', 'penjualan.kode_trx', '=', 'detail_transaksi.kode_trx')
            ->orderBy('penjualan.nama_customer')
            ->select('penjualan.nama_customer', 'detail_transaksi.*')
            ->get()
            ->groupBy('nama_customer')
            ->map(function ($items) {
                $items = $items->toArray();
                $rowspan = count($items);
                $no = 1;
                foreach ($items as &$item) {
                    $item->rowspan = $rowspan;
                    $item->no = $no++;
                }
                return $items;
            })
            ->flatten();

        // dd($data);

        return view('staff.laporan.index', compact('data'));
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
