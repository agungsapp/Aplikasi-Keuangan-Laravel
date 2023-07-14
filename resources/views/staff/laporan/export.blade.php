<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>export</title>
	<style>
		table,
		tr,
		td,
		th {
			border: 1px solid black;
			padding: 5px;
		}

		table {
			margin: auto;
			margin-top: 3rem;
		}

    h1 {
      text-align: center
    }
	</style>
</head>

<body>

  <h1>
LAPORAN PENJUALAN
  </h1>

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
			$totalBarang = 0;
			$totalBayar = 0;
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

			@php
			$totalBarang += $item->jumlah;
			$totalBayar += $item->sub_total;
			@endphp

			@endforeach
			<tr>
				<td colspan="4"><strong>Total</strong></td>
				<td>{{ $totalBarang }}</td>
				<td></td>
				<td>{{ Str::rupiah($totalBayar) }}</td>
			</tr>
		</tbody>
	</table>
</body>

</html>
