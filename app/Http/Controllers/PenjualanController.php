<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksiModel;
use App\Models\KategoriModel;
use App\Models\penjualan;
use App\Models\ProdukModel;
use App\Models\QtyModel;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{

    public function checkout()
    {
        // Mendapatkan data keranjang dari session
        $cart = session()->get('cart', []);

        // Mendapatkan nomor transaksi baru
        $nomorTransaksi = 'TRX-' . uniqid();

        // Inisialisasi jumlah dan total
        $jumlah = 0;
        $total = 0;

        // Mengiterasi setiap item dalam keranjang
        foreach ($cart as $item) {
            // Simpan data detail transaksi ke dalam database
            DetailTransaksiModel::create([
                'kode_trx' => $nomorTransaksi,
                'kode_produk' => $item['kode_produk'],
                'jenis_toples' => $item['jenis_toples'],
                'qty' => $item['qty'],
                'jumlah' => $item['jumlah_beli'],
                'harga_satuan' => $item['harga_satuan'],
                'sub_total' => $item['harga_satuan'] * $item['jumlah_beli'],
                'diskon' => 0,
                // Tambahkan kolom lain sesuai kebutuhan Anda
            ]);

            // Mengupdate jumlah dan total
            $jumlah += $item['jumlah_beli'];
            $total += $item['harga_satuan'] * $item['jumlah_beli'];

            // Operasi lain seperti mengurangi stok barang, dll.
        }

        // Simpan data penjualan ke dalam database
        penjualan::create([
            'kode_trx' => $nomorTransaksi,
            'jumlah' => $jumlah,
            'total' => $total,
            // Tambahkan kolom lain sesuai kebutuhan Anda
        ]);

        // Setelah selesai, hapus data keranjang dari session
        session()->forget('cart');

        // Redirect atau tampilkan pesan sukses
        return redirect()->back()->with('success', 'Checkout berhasil!');
    }

    public function delete_keranjang(Request $request)
    {

        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('toast_success', 'Berhasil menghapus data keranjang !');
        }
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return view('staff.penjualan.index')->with('data', penjualan::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($kode_trx = null)
    {
        //



        $data = [
            'produk' => ProdukModel::all(),
            'jenis' => KategoriModel::all(),
            'qty' => QtyModel::all()
        ];

        return view('staff.penjualan.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function tambahkeranjang(Request $request)
    {
        //

        $rules = [
            'produk' => 'required',
            'jenis_toples' => 'required',
            'qty' => 'required',
            'harga_hide' => 'required',
            'jumlah_beli' => 'required',
        ];

        $messages = [
            'produk.required' => 'produk tidak boleh kosong !',
            'jenis_toples.required' => 'jenis toples harus di isi !',
            'qty.required' => 'qty tidak boleh kosong !',
            'harga_hide.required' => 'harga tidak boleh kosong !',
            'jumlah_beli.required' => 'jumlah beli tidak boleh kosong !',
        ];
        $request->validate($rules, $messages);


        try {
            $produk = ProdukModel::where('kode', $request->produk)->firstOrFail();
            $jenis = KategoriModel::where('id', $request->jenis_toples)->firstOrFail();
            $qty = QtyModel::where('id', $request->qty)->firstOrFail();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['Produk tidak ditemukan.']);
        }

        // return dd($jenis->kategori);

        $cart = session()->get('cart', []);

        if (isset($cart[$request->produk])) {
            $cart[$request->produk]['jumlah_beli']++;
        } else {
            $cart[$request->produk] = [
                'kode_produk' => $request->produk,
                'nama_produk' => $produk->name,
                'harga_satuan' => $request->harga_hide,
                'jumlah_beli' => $request->jumlah_beli,
                'jenis_toples' => $jenis->kategori,
                'qty'           => $qty->name,
                'subtotal' => $request->harga_hide * $request->jumlah_beli
            ];
        }
        session()->put('cart', $cart);
        return redirect()->route('staff.penjualan.create')->with('toast_success', 'Berhasil menambahkan keranjang !');


        // =========================cara lain lagi ====================

        // $items = [];
        // $items[] =  $request->except(['_token']);
        // $request->session()->put('cart', $items);
        // return redirect()->route('staff.penjualan.create');

        // =========================================

        // $data = [
        //     'kode_trx' => '',
        //     'kode_produk' => '',
        //     'sub_total' => '',
        //     'diskon' => '',
        // ];

        //belom bisa selesai soalnya kepikiran ntar usernya gimana ? maksudnya nama customer

        // return "kode produk : $request->produk <br>
        // toples  $request->jenis_toples <br>
        // qty pembelian : $request->qty <br>
        // harga satuan : $request->harga_hide <br> 
        // jumlah beli : $request->jumlah_beli <br> 
        // diskon : $request->diskon";
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
     * @param  \App\Models\penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function show(penjualan $penjualan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function edit(penjualan $penjualan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, penjualan $penjualan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function destroy(penjualan $penjualan)
    {
        //
    }
}
