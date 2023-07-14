@extends('layouts.main')
@section('content')
		<div class="row">
				<div class="col-12">
						<div class="card">
								<div class="card-header bg-primary text-white">
										Buat Transaksi Baru
								</div>
								<div class="card-body">
										<div class="row">
												<div class="col-12">
														{{-- search --}}
														{{-- <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="Cari produk ..." aria-label="Recipient's username"
                aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div> --}}
														{{-- /search --}}
												</div>
										</div>
										{{-- section input detail penjualan --}}
										<div class="row mt-3">
												<div class="col-4 offset-1">
														<form action="{{ route('tambahkeranjang') }}" method="POST">
																@csrf
																{{-- select pencarian produk --}}
																<div class="mb-3">
																		<div class="form-group">
																				<select id="produk" class="form-control" name="produk" autofocus>
																						<option selected class="text-center">-- pilih produk --</option>
																						@foreach ($produk as $item)
																								<option value="{{ $item->kode }}">
																										{{ $item->kode . ' | ' . $item->name . ' | ' . $item->jenis_toples }}
																								</option>
																						@endforeach

																				</select>
																		</div>
																</div>

																{{-- kode produk auto --}}
																{{-- <div class="mb-3">
																		<div class="form-group">
																				<input type="text" class="form-control" id="kode_produk" placeholder="kode produk ..."
																						value="{{ old('kode_produk') }}" name="kode_produk">
																		</div>
																</div> --}}
																{{-- nama produk auto --}}
																{{-- <div class="mb-3">
																		<div class="form-group">
																				<input type="text" class="form-control" id="nama_produk" placeholder="nama produk ..."
																						value="{{ old('nama_produk') }}" name="nama_produk">
																		</div>
																</div> --}}

																{{-- select tipe toples --}}
																{{-- <div class="mb-3">
																		<div class="form-group">
																				<select class="form-control" name="jenis_toples" id="jenis_toples">
																						<option selected class="text-center">-- pilih jenis toples --</option>
																						@foreach ($jenis as $item)
																								<option value="{{ $item->id }}">{{ $item->kategori }}</option>
																						@endforeach

																				</select>
																		</div>
																</div> --}}

																{{-- satuan_beli qty --}}
																<div class="mb-3">
																		<select id="satuan_pembelian" class="form-select form-control" name="satuan_beli"
																				aria-label="Default select example">
																				<option selected>-- Pilih Satuan Pembelian --</option>
																				<option value="pcs">Pcs</option>
																				<option value="dus">Dus</option>
																				{{-- <option value="paket">Paket</option>
																				<option value="tabung">Tabung</option> --}}
																		</select>
																</div>
																{{-- select qty --}}
																{{-- <div class="mb-3">
																		<div class="form-group">
																				<select class="form-control" name="qty" id="qty">
																						<option class="text-center">-- pilih jenis qty --</option>
																						@foreach ($qty as $item)
																								<option value="{{ $item->id }}">{{ $item->name }}</option>
																						@endforeach
																				</select>
																		</div>
																</div> --}}

																{{-- jumlah pembelian --}}
																<div class="mb-3">
																		<div class="form-group">
																				<label for="jumlah_beli">Jumlah</label>
																				<input type="number" class="form-control {{ $errors->has('jumlah_beli') ? 'is-invalid' : '' }}"
																						id="jumlah_beli" placeholder="Banyaknya ..." value="{{ old('jumlah_beli') }}" name="jumlah_beli">
																				@error('jumlah_beli')
																						<div id="jumlah_beli" class="invalid-feedback">
																								{{ $message }}
																						</div>
																				@enderror
																		</div>
																</div>

																{{-- harga satuan --}}
																<div class="mb-3">
																		<div class="form-group">
																				<label for="harga_satuan">Harga satuan</label>
																				<input type="text" class="form-control {{ $errors->has('harga_satuan') ? 'is-invalid' : '' }}"
																						id="harga_satuan" placeholder="Harga satuan ..." value="" name="harga_satuan" readonly>
																				{{-- input hide harga --}}
																				<input type="hidden" id="harga_hide" name="harga_hide">
																				@error('harga_satuan')
																						<div id="harga_satuan" class="invalid-feedback">
																								{{ $message }}
																						</div>
																				@enderror
																		</div>
																</div>
																<button type="submit" class="btn btn-primary">Tambah</button>

												</div>
												<div class="col-4 offset-1">
														{{-- <div class="mb-3"> --}}
																{{-- diskon --}}
																{{-- <input type="number" class="form-control {{ $errors->has('diskon') ? 'is-invalid' : '' }}" id="diskon"
																		placeholder="Diskon ..." value="0" name="diskon">
														</div> --}}
														<p>Total Belanja :</p>
														<div id="total_belanja" class="card bg-info fw-bold px-3 py-2 text-white">
																Rp.0000
														</div>
														</form>

														<div class="alert alert-info mt-3 p-2">
																<ul>
																		<li>pilih produk terlebih dahulu</li>
																		<li>kemudian masukan jumlah pembelian</li>
																		<li>masukan diskon bila ada</li>
																</ul>
														</div>
														@if ($errors->all())
																<div class="alert alert-danger mt-1 p-2">
																		<ul>
																				@foreach ($errors->all() as $messages)
																						<li>{{ $messages }}</li>
																				@endforeach

																		</ul>
																</div>
														@endif

												</div>
										</div>
										{{-- /section input detail penjualan --}}

								</div>
						</div>
				</div>
		</div>
		<div class="row mt-5">
				<div class="col-12">
						<div class="card">
								<div class="card-header bg-primary text-white">
										<i class="fa fa-shopping-cart" aria-hidden="true"></i> Keranjang
								</div>
								<div class="card-body">
										<div class="table-responsive">
												<table class="table-hover table">
														<thead>
																<tr>
																		<th scope="col">No</th>
																		<th scope="col">Kode Produk</th>
																		<th scope="col">Nama Produk</th>
																		<th scope="col">Jenis Toples</th>
																		{{-- <th scope="col">Qty</th> --}}
																		<th scope="col">Jumlah</th>
																		<th scope="col">Harga Satuan</th>
																		<th scope="col">Total</th>
																		<th scope="col">Action</th>
																</tr>
														</thead>
														<tbody>
																<!-- Contoh bagian dalam tabel untuk menampilkan isi keranjang -->
																@php
																		$cart = session()->get('cart', []);
																		$total_bayar = 0;
																		$jumlah = 0;
																@endphp
																@if ($cart != null)
																		@foreach ($cart as $item)
																				<tr data-id="{{ $item['kode_produk'] }}">
																						<td>{{ $loop->iteration }}</td>
																						<td>{{ $item['kode_produk'] }}</td>
																						<td>{{ $item['nama_produk'] }}</td>
																						<td>{{ $item['jenis_toples'] }}</td>
																						{{-- <td>{{ $item['qty'] }}</td> --}}
																						<td>{{ $item['jumlah_beli'] }}</td>
																						<td>Rp. {{ number_format($item['harga_satuan']) }}</td>
																						<td>Rp. {{ number_format($item['subtotal']) }}</td>
																						<td>
																								<button href="#" class="btn btn-danger btn-delete">Hapus</button>
																						</td>
																				</tr>
																				@php
																						$total_bayar += $item['subtotal'];
																						$jumlah += $item['jumlah_beli'];
																				@endphp
																		@endforeach
																		<tr class="bg-dark text-white">
																				<td colspan="4" align="right">jumlah =</td>
																				<td>{{ $jumlah }}</td>
																				<td align="right">Total =</td>
																				<td>
																						Rp. {{ number_format($total_bayar) }}
																				</td>
																				<td></td>
																		</tr>
																@else
																		<tr>
																				<td colspan="100" class="text-center">-- Keranjang Masih Kosong --</td>
																		</tr>
																@endif

														</tbody>
												</table>
										</div>

								</div>
								<div class="card-footer">

										<!-- Button trigger modal konfirmasi delete -->
										<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#kosongkan-keranjang">
												Kosongkan keranjang
										</button>

										<!-- Modal -->
										<div class="modal fade" id="kosongkan-keranjang" tabindex="-1" aria-labelledby="kosongkan-keranjangLabel"
												aria-hidden="true">
												<div class="modal-dialog">
														<div class="modal-content">
																<div class="modal-header">
																		<h5 class="modal-title" id="exampleModalLabel">Yakin ?</h5>
																		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																				<span aria-hidden="true">&times;</span>
																		</button>
																</div>
																<div class="modal-body">
																		<p>yakin akan mengosongkan keranjang dan menghapus bersih seluruh data belanja di dalamnya ?</p>
																</div>
																<div class="modal-footer">
																		<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
																		<button type="button" id="bersihkan-keranjang" class="btn btn-primary">Yakin</button>
																</div>
														</div>
												</div>
										</div>

										<!-- Button trigger modal konfirmasi checkout -->
										<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#konfirmasi-checkout">
												Checkout
										</button>

										<!-- Modal -->
										<div class="modal fade" id="konfirmasi-checkout" tabindex="-1" aria-labelledby="konfirmasi-checkoutLabel"
												aria-hidden="true">
												<div class="modal-dialog">
														<div class="modal-content">
																<div class="modal-header">
																		<h5 class="modal-title" id="exampleModalLabel">Yakin akan melakukan Checkout ?</h5>
																		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																				<span aria-hidden="true">&times;</span>
																		</button>
																</div>
																<div class="modal-body">
																		<div class="mb-3">
																				<div class="alert alert-info" role="alert">
																						<p>seluruh data dalam keranjang akan di simpan dan di proses sebagai transaksi</p>
																				</div>

																		</div>
																		<div class="mb-3">
																				<label for="nama_customer">Nama Customer</label>
																				<input id="nama_customer" class="form-control" type="text" name="nama_customer"
																						placeholder="masukan nama customer ...">
																		</div>
																</div>
																<div class="modal-footer">
																		<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
																		<button id="btn-checkout" type="button" class="btn btn-primary">Ya, Checkout</button>
																</div>
														</div>
												</div>
										</div>

										{{-- <button id="bersihkan-keranjang" class="btn btn-danger" data-confirm-delete="true">Kosongkan Keranjang</button> --}}
										{{-- <a href="#" id="btn-checkout" class="btn btn-warning">Checkout</a> --}}
								</div>
						</div>
				</div>
		</div>
@endsection

@push('scripts')
		<script>
				$(document).ready(function() {

						// load select2
						$('#produk').select2();


						// get value select produk
						$('#produk').on('change', function() {
								var selectedValue = $(this).val();

								// Mengirim permintaan AJAX ke URL /getprodukbyid/$id_produk
								$.ajax({
										url: '/getprodukbyid/' + selectedValue,
										type: 'GET',
										success: function(response) {
												var harga = response.harga;
												$('#harga_satuan').val(formatRupiah(response.harga));
												$('#harga_hide').val(response.harga);
												console.log('Harga barang satuan: ' +
														harga); // Output harga ke konsol (bisa diganti dengan aksi lainnya)
										},
										error: function(xhr, status, error) {
												console.error('Terjadi kesalahan: ' + error);
										}
								});
						});

						// triger input jumlah_beli
						$('#jumlah_beli').on('keyup', function() {
								var jumlah = $(this).val();
								var harga = $('#harga_hide').val();
								var total = $('#total_belanja'); // Perbaiki pemilihan elemen total belanja

								var satuan_beli = $('#satuan_pembelian').val();
								// console.log(satuan_beli);
								if (satuan_beli == 'pcs') {
										jumlah_beli_total = jumlah * 1
								} else if (satuan_beli == 'dus') {
										jumlah_beli_total = jumlah * 15
								}

								if (harga != 0) {
										var total_belanja = parseInt(harga) * jumlah_beli_total;
										console.log(total_belanja);
										var formattedTotal = formatRupiah(total_belanja); // Memformat nilai total belanja
										total.html(formattedTotal);
								} else {
										total.html('pilih produk dahulu !');
								}


								console.log(jumlah);
						});


						// function format rupiah
						function formatRupiah(angka) {
								var numberString = angka.toString();
								var split = numberString.split('.');
								var sisa = split[0].length % 3;
								var rupiah = split[0].substr(0, sisa);
								var ribuan = split[0].substr(sisa).match(/\d{3}/gi);

								if (ribuan) {
										var separator = sisa ? '.' : '';
										rupiah += separator + ribuan.join('.');
								}

								rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
								return 'Rp ' + rupiah;
						}


						// delete keranjang
						$('.btn-delete').click(function(e) {
								e.preventDefault();

								console.log('bisa');

								var ele = $(this);

								if (confirm('Are you sure you want to delete')) {
										$.ajax({
												url: '{{ route('deletekeranjang') }}',
												method: 'DELETE',
												data: {
														_token: '{{ csrf_token() }}',
														id: ele.parents("tr").attr("data-id")
												},
												success: function(response) {
														window.location.reload();
												}
										})
								}
						})


						// bersihkan keranjang
						$('#bersihkan-keranjang').click(function() {
								console.log('Bersihkan keranjang ditekan');

								// Mengirim permintaan AJAX untuk menghapus session 'cart'
								$.ajax({
										url: '/kosongkankeranjang',
										method: 'POST',
										data: {
												_token: '{{ csrf_token() }}'
										},
										success: function(response) {
												// Menghapus session 'cart' di sisi klien
												console.log(response.message);
												sessionStorage.removeItem('cart');

												// Redirect atau lakukan tindakan lain setelah berhasil menghapus
												// Misalnya, memuat ulang halaman atau menampilkan pesan sukses
												window.location.reload(); // Contoh: Memuat ulang halaman
										}
								});

						});


						// konfirmasi checkout
						// Konfirmasi checkout
						// $('#btn-checkout').click(function(e) {
						// 		e.preventDefault();

						// 		Swal.fire({
						// 				title: 'Ckeckout ?',
						// 				text: "Data transaksi akan disimpan",
						// 				icon: 'warning',
						// 				showCancelButton: true,
						// 				confirmButtonColor: '#3085d6',
						// 				cancelButtonColor: '#d33',
						// 				confirmButtonText: 'Ya, Proses Sekarang'
						// 		}).then((result) => {
						// 				if (result.isConfirmed) {
						// 						// Redirect ke halaman checkout
						// 						window.location.href = '{{ route('checkout') }}';
						// 				}
						// 		});
						// });


						// checkout
						$('#btn-checkout').click(function() {
            var namaCustomer = $('#nama_customer').val();

            // Mengirim permintaan AJAX untuk menyimpan data transaksi
            $.ajax({
                url: '/simpan-transaksi',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    nama_customer: namaCustomer,
                    cart: JSON.stringify(sessionStorage.getItem('cart'))
                },
                success: function(response) {
                    // Redirect atau tampilkan pesan sukses
                    // Misalnya, redirect ke halaman sukses atau tampilkan pesan dengan modal
                    window.location.href = '{{ route('staff.penjualan.create') }}';
                },
                error: function(xhr, status, error) {
                    console.error('Terjadi kesalahan: ' + error);
                }
            });
        });


				});
		</script>
@endpush
