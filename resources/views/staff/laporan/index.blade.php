@extends('layouts.main')
@section('content')
		<div class="row">
				<div class="col-lg-10 col-md-12">
						<div class="card shadow-md">
								<div class="card-header bg-primary text-white">
										<h5>Laporan Penjualan</h5>
								</div>
								<div class="card-body">
										{{-- <a href="{{ route('staff.penjualan.create') }}" class="mb-3 btn btn-primary">Tambah Transaksi</a> --}}
										<div class="table-responsive">
											<table class="table">
    <thead>
        <tr>
            <th scope="col">No.</th>
            <th scope="col">Nama Customer</th>
            <th scope="col">Nama Barang</th>
            <th scope="col">Jenis Toples</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Harga</th>
            <th scope="col">SubTotal</th>
        </tr>
    </thead>
    <tbody>
        @php
            $currentCustomer = null;
            $no = 0;
        @endphp
        @foreach ($data as $item)
            @if ($currentCustomer !== $item->nama_customer)
                @php
                    $currentCustomer = $item->nama_customer;
                    $no++;
                @endphp
                <tr>
                    <th rowspan="{{ $item->rowspan }}" scope="row">{{ $no }}</th>
                    <td rowspan="{{ $item->rowspan }}">{{ $item->nama_customer }}</td>
                    <td>{{ $item->kode_produk }}</td>
                    <td>{{ $item->jenis_toples }}</td>
                    <td>{{ $item->jumlah }}</td>
                    <td>{{ Str::rupiah($item->harga_satuan) }}</td>
                    <td>{{ Str::rupiah($item->sub_total) }}</td>
                </tr>
            @else
                <tr>
                    <td>{{ $item->kode_produk }}</td>
                    <td>{{ $item->jenis_toples }}</td>
                    <td>{{ $item->jumlah }}</td>
                    <td>{{ Str::rupiah($item->harga_satuan) }}</td>
                    <td>{{ Str::rupiah($item->sub_total) }}</td>
                </tr>
            @endif
        @endforeach
    </tbody>
</table>

										</div>

								</div>
						</div>
				</div>
		</div>
@endsection
