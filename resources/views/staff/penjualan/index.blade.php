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
                <td>{{ $item->kode_trx }}</td>
                <td>{{ $item->nama }}</td>
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
                        <form action="{{ url('produk/'. $item->id) }}" method="post">
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
                  <form class="d-inline" action="{{ url('produk/'. $item->id) }}" method="POST">
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
</div>
@endsection