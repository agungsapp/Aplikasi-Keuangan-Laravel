@extends('layouts.main')
@section('content')
<div class="row">
  <div class="col-9">
    <div class="card shadow-md">
      <div class="card-header bg-primary text-white">
        <h5>Data kategori QTY</h5>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama qty</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($qty as $k)
              <tr>
                <td scope="row">{{ $loop->iteration }}</td>
                <td>{{ $k->name }}</td>
                <td><span class="badge badge-success">Data Kosong</span></td>
                <td>
                  {{-- tombol lama --}}
                  {{-- <a href="{{ url('qty/'.$k->id.'/edit')}}" class="btn btn-warning">Edit</a> --}}

                  <!-- Button trigger modal edit -->
                  <button type="button" class="btn btn-warning" data-toggle="modal"
                    data-target="#modalEdit{{ $k->id }}">
                    Edit
                  </button>

                  {{-- area modal edit start --}}
                  <!-- Modal -->
                  <div class="modal fade" id="modalEdit{{ $k->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Edit QTY</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form action="{{ url('qty/'. $k->id ) }}" method="POST">
                          @csrf
                          @method('PUT')
                          <div class="modal-body">
                            {{-- form edit start --}}
                            <div class="mb-3">
                              <h6 class="d-inline text-dark text-bold">ID QTY :</h6>
                              <p class="d-inline">{{ $k->id }}</p>
                              <input type="hidden" class="form-control" name="id" value="{{ $k->id }}" readonly>
                            </div>
                            <div class="mb-3">
                              <label for="qty" class="form-label">Nama QTY</label>
                              <input id="qty" class="form-control" type="text" name="qtyedit"
                                placeholder="update nama qty" aria-label="update nama qty ..." aria-describedby="qty"
                                value="{{ $k->name }}">

                            </div>
                            {{-- form edit end --}}
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  {{-- area modal edit end --}}

                  {{-- delete button start --}}
                  <form class="d-inline" action="{{ url('qty/'. $k->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="konfirmasiHapus()" class="btn btn-danger">Delete</button>
                  </form>

                  {{-- delete button end --}}

                </td>
              </tr>
              @endforeach

            </tbody>
          </table>
          {{-- <div class="container">
            @foreach ($qty as $user)
            {{ $user->name }}
            @endforeach
          </div> --}}

          {{ $qty->links() }}
        </div>

      </div>
    </div>
  </div>

  {{-- colom add data qty --}}
  <div class="col-3">
    <div class="card shadow-md">
      <div class="card-header bg-primary text-white">
        <h5>Tambah Data</h5>
      </div>
      <div class="card-body">
        <form action="{{ route('admin.kategori.qty.store') }}" method="POST">
          @csrf

          <div class="mb-3">
            <label for="qty" class="form-label">Nama qty</label>
            <input type="text" class="form-control {{ $errors->has('qty') ? 'is-invalid' : '' }}" name="qty" id="qty"
              aria-describedby="helpId" placeholder="Masukan nama qty ..." value="{{ old('qty') }}">

            @error('qty')
            <div id="qty" class="invalid-feedback">
              {{ $message}}
            </div>
            @enderror
          </div>

          <button type="submit" class="btn btn-success">Tambah Data</button>

        </form>
      </div>
    </div>

    @error('qtyedit')
    <div class="alert alert-danger mt-4" role="alert">
      gagal update data !
      {{ $message}}
    </div>
    @enderror
  </div>

  {{-- add data qty end --}}

</div>
@endsection