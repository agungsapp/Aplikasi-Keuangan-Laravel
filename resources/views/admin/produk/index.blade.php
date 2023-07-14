@extends('layouts.main')
@section('content')
		<div class="row">
				<div class="col-9">
						<div class="card shadow-md">
								<div class="card-header bg-primary text-white">
										<h5>Data Produk</h5>
								</div>
								<div class="card-body">
										<div class="table-responsive">
												<table class="table">
														<thead>
																<tr>
																		<th scope="col">No</th>
																		<th scope="col">Kode</th>
																		<th scope="col">Nama produk</th>
																		<th scope="col">Jenis Toples</th>
																		<th scope="col">Harga</th>
																		<th scope="col">Action</th>
																</tr>
														</thead>
														<tbody>
																@foreach ($data as $item)
																		<tr class="">
																				<td scope="row">{{ $loop->iteration }}</td>
																				<td>{{ $item->kode }}</td>
																				<td>{{ $item->name }}</td>
																				<td>{{ $item->jenis_toples }}</td>
																				<td>{{ Str::rupiah($item->harga) }} </td>
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
																												<form action="{{ url('produk/' . $item->id) }}" method="post">
																														@csrf
																														@method('PUT')
																														<div class="modal-header">
																																<h5 class="modal-title" id="exampleModalLabel">Edit Produk</h5>
																																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																																		<span aria-hidden="true">&times;</span>
																																</button>
																														</div>
																														<div class="modal-body">
																																{{-- modal body --}}
																																<div class="mb-3">
																																		<input class="form-control" type="text" value="{{ $item->kode }}" name="kodeedit"
																																				readonly>
																																</div>

																																<div class="mb-3">
																																		<label for="produk" class="form-label">Nama produk</label>
																																		<input type="text" class="form-control" name="nameedit" id="produk"
																																				aria-describedby="helpId" placeholder="Masukan nama produk ..."
																																				value="{{ $item->name }}">

																																</div>

																																<div class="mb-3">
																																		<label id="label-rupiah" for="harga" class="form-label">Harga</label>
																																		<input type="number" class="form-control" name="hargaedit" id="harga"
																																				aria-describedby="helpId" placeholder="Masukan nama harga ..."
																																				value="{{ $item->harga }}">

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

																						{{-- form tombol delete --}}
																						<form class="d-inline" action="{{ url('produk/' . $item->id) }}" method="POST">
																								@csrf
																								@method('DELETE')
																								<button type="submit" onclick="konfirmasiHapus()" class="btn btn-danger">Delete</button>
																						</form>
																				</td>
																		</tr>
																@endforeach

														</tbody>
												</table>
										</div>

								</div>
						</div>
				</div>
				{{-- colom add data produk --}}
				<div class="col-3">
						<div class="card shadow-md">
								<div class="card-header bg-primary text-white">
										<h5>Tambah Data</h5>
								</div>
								<div class="card-body">
										<form action="{{ route('admin.produk.store') }}" method="POST">
												@csrf

												<div class="mb-3">
														<input class="form-control" type="text" value="{{ $id }}" name="kode" readonly>
												</div>

												{{-- nama produk --}}
												<div class="mb-3">
														<label for="produk" class="form-label">Nama produk</label>
														<input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name"
																id="produk" aria-describedby="helpId" placeholder="Masukan nama produk ..."
																value="{{ old('name') }}">
														@error('name')
																<div id="name" class="invalid-feedback">
																		{{ $message }}
																</div>
														@enderror
												</div>

												{{-- jenis toples --}}
												<div class="mb-3">
                          <select class="form-select form-control {{ $errors->has('jenis_toples') ? 'is-invalid' : '' }}" name="jenis_toples" aria-label="Default select example">
														<option selected>-- pilih jenis toples --</option>
														<option value="bulat">Bulat</option>
														<option value="segi">Segi</option>
														<option value="tabung">Tabung</option>
												</select>
                       	@error('jenis_toples')
																<div id="jenis_toples" class="invalid-feedback">
																		{{ $message }}
																</div>
														@enderror
                        </div>
												
												{{-- harga --}}
												<div class="mb-3">
														<label id="label-rupiah-create" for="harga" class="form-label">Harga</label>
														<input type="number" class="form-control {{ $errors->has('harga') ? 'is-invalid' : '' }}"
																name="harga" id="harga-create" aria-describedby="helpId" placeholder="Masukan nama harga ..."
																value="{{ old('harga') }}">
														@error('harga')
																<div id="harga-create" class="invalid-feedback">
																		{{ $message }}
																</div>
														@enderror
												</div>

												{{-- <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <select id="kategori" name="kategori" class="custom-select">
              <option selected>-- pilih kategori --</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
          </div> --}}



												<button class="btn btn-success mt-3">Tambah Data</button>

										</form>
								</div>
						</div>
						@error('nameedit')
								<div class="alert alert-danger mt-4" role="alert">
										gagal update data ! <br>
										{{ $message }}
								</div>
						@enderror
				</div>
		</div>
@endsection
