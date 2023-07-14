@extends('layouts.main')
@section('content')
		<div class="row">
				<div class="col-10">
						<div class="card shadow-md">
								<div class="card-header bg-primary text-white">
										<h5>Detail Transaksi</h5>
								</div>
								<div class="card-body">
										{{-- <a href="{{ route('staff.penjualan.create') }}" class="mb-3 btn btn-primary">Tambah Transaksi</a> --}}
										<div class="table-responsive">
												<table class="table">
														<thead>
																<tr>
																		<th scope="col">No.</th>
																		<th scope="col">Nama Produk</th>
																		<th scope="col">Jenis Toples</th>
																		<th scope="col">Jumlah</th>
																		<th scope="col">Harga Satuan</th>
																		<th scope="col">Sub Total</th>
																		<th scope="col">Tgl Transaksi</th>
																</tr>
														</thead>
														<tbody>
																@php
																		$totalBarang = 0;
																		$totalBelanja = 0;
																@endphp
																@foreach ($data as $item)
																		<tr>
																				<th scope="row">{{ $loop->iteration }}</th>
																				<td>{{ $item->name }}</td>
																				<td>{{ $item->jenis_toples }}</td>
																				<td>{{ $item->jumlah }}</td>
																				<td>{{ Str::rupiah($item->harga_satuan) }}</td>
																				<td>{{ Str::rupiah($item->sub_total) }}</td>
																				<td>{{ $item->created_at }}</td>
																		</tr>
																		@php
																				$totalBarang += $item->jumlah;
																				$totalBelanja += $item->sub_total;
																		@endphp
																@endforeach
																<tr class="bg-dark font-weight-bold text-white">
																		<td align="right" colspan="3">Total barang : </td>
																		<td>{{ $totalBarang }}</td>
																		<td>Total Belanja :</td>
																		<td colspan="2"> = {{ Str::rupiah($totalBelanja) }}</td>
																</tr>
														</tbody>

												</table>
										</div>

								</div>
						</div>
				</div>
		</div>
@endsection
