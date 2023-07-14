@extends('layouts.main')
@section('content')
		<div class="row">
				<div class="col-9">
						<div class="card shadow-md">
								<div class="card-header bg-primary text-white">
										<h5>Data Transaksi</h5>
								</div>
								<div class="card-body">
										{{-- <a href="{{ route('staff.penjualan.create') }}" class="mb-3 btn btn-primary">Tambah Transaksi</a> --}}
										<div class="table-responsive">
												<table class="table">
														<thead>
																<tr>
																		<th scope="col">No</th>
																		<th scope="col">Kode transaksi</th>
																		<th scope="col">Nama Customer</th>
																		<th scope="col">Total</th>
																		<th scope="col">Action</th>
																</tr>
														</thead>
														<tbody>
																@foreach ($data as $item)
																		<tr class="">
																				<td scope="row">{{ $loop->iteration }}</td>
																				<td>
                                          <a href="{{ route('staff.penjualan.show',  $item->id) }}" class="font-weight-bold">{{ $item->kode_trx }}</a>
                                        </td>
																				<td>{{ $item->nama_customer }}</td>
																				<td>{{ Str::rupiah($item->total) }} </td>
																				<td>
																						{{-- modal edit --}}
																						<button type="button" class="btn btn-warning" data-toggle="modal"
																								data-target="#modalEdit{{ $item->id }}">
																								Edit
																						</button>

																						<!-- Modal -->
																						<div class="modal fade" id="modalEdit{{ $item->id }}" tabindex="-1" role="dialog"
																								aria-labelledby="exampleModalLabel" aria-hidden="true">
																								<div class="modal-dialog" role="document">
																										<div class="modal-content">
																												<form action="{{ route('staff.penjualan.update', $item->id) }}" method="post">
																														@csrf
																														@method('PUT')
																														<div class="modal-header">
																																<h5 class="modal-title" id="exampleModalLabel">Edit Nama Customer</h5>
																																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																																		<span aria-hidden="true">&times;</span>
																																</button>
																														</div>
																														<div class="modal-body">
																																{{-- modal body --}}
																																{{-- <div class="mb-3">
                              <input class="form-control" type="text" value="{{ $item->kode }}" name="kodeedit"
                                readonly>
                            </div> --}}

																																<div class="mb-3">
																																		<label for="customer" class="form-label">Nama Customer</label>
																																		<input type="text" class="form-control" name="nama_customer" id="customer"
																																				aria-describedby="helpId" placeholder="Masukan nama customer ..."
																																				value="{{ $item->nama_customer }}" required autocomplete="off">

																																</div>
																																{{-- modal body end --}}
																														</div>
																														<div class="modal-footer">
																																<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
																																<button type="submit" class="btn btn-primary">Simpan</button>
																														</div>
																												</form>

																										</div>
																								</div>
																						</div>



																						{{-- modal edit end --}}


																						{{-- modal konfirmasi delete  --}}
																						<!-- Button trigger modal -->
																						<button type="button" class="btn btn-danger" data-toggle="modal"
																								data-target="#modal-delete{{ $item->id }}">
																								Delete
																						</button>

																						<!-- Modal -->
																						<div class="modal fade" id="modal-delete{{ $item->id }}" tabindex="-1"
																								aria-labelledby="modal-deleteLabel" aria-hidden="true">
																								<div class="modal-dialog">
																										<div class="modal-content">
																												<div class="modal-header">
																														<h5 class="modal-title" id="modal-deleteLabel">Delete data transaksi</h5>
																														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																																<span aria-hidden="true">&times;</span>
																														</button>
																												</div>
																												<div class="modal-body">
																														<p>Yakin akan menghapus data transaksi <strong>{{ $item->nama_customer }}</strong> secara
																																permanen ?</p>
																												</div>
																												<div class="modal-footer">
																														<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
																														<form class="d-inline" action="{{ route('staff.penjualan.destroy', $item->id) }}"
																																method="POST">
																																@csrf
																																@method('DELETE')
																																<button type="submit" class="btn btn-danger">Delete</button>
																														</form>
																												</div>
																										</div>
																								</div>
																						</div>
																						{{-- / modal konfirmasi delete  --}}


																						{{-- form tombol delete --}}

																				</td>
																		</tr>
																@endforeach

														</tbody>
												</table>
										</div>

								</div>
						</div>
				</div>
		</div>
@endsection
