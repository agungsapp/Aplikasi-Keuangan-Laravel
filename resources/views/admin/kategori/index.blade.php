@extends('layouts.main')
@section('content')
<div class="row">
  <div class="col-7">
    <div class="card shadow-md">
      <div class="card-header bg-primary text-white">
        <h3>Data Kategori</h3>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Kategori</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($kategori as $k)
              <tr class="">
                <td scope="row">{{ $loop->iteration }}</td>
                <td>{{ $k->kategori }}</td>
                <td>
                  {{-- tombol lama --}}
                  {{-- <a href="{{ url('kategori/'.$k->id.'/edit')}}" class="btn btn-warning">Edit</a> --}}

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
                          <h5 class="modal-title" id="exampleModalLabel">Edit Kategori</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form action="{{ url('kategori/'. $k->id ) }}" method="POST">
                          @csrf
                          @method('PUT')
                          <div class="modal-body">
                            {{-- form edit start --}}
                            <div class="mb-3">
                              <h6 class="d-inline text-dark text-bold">ID Kategori :</h6>
                              <p class="d-inline">{{ $k->id }}</p>
                              <input type="hidden" class="form-control" name="id" value="1" readonly>
                            </div>
                            <div class="mb-3">
                              <label for="kategori" class="form-label">Nama Kategori</label>
                              <input id="kategori" class="form-control" type="text" name="kategoriedit"
                                placeholder="update nama kategori" aria-label="update nama kategori ..."
                                aria-describedby="kategori" value="{{ $k->kategori }}">

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
                  <form class="d-inline" action="{{ url('kategori/'. $k->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                  </form>

                  {{-- delete button end --}}

                </td>
              </tr>
              @endforeach

            </tbody>
          </table>
          {{-- <div class="container">
            @foreach ($kategori as $user)
            {{ $user->name }}
            @endforeach
          </div> --}}

          {{ $kategori->links() }}
        </div>

      </div>
    </div>
  </div>
  {{-- colom add data kategori --}}
  <div class="col-5">
    <div class="card shadow-md">
      <div class="card-header bg-primary text-white">
        <h3>Tambah Data</h3>
      </div>
      <div class="card-body">
        <form action="{{ route('admin.kategori.store') }}" method="POST">
          @csrf

          <div class="mb-3">
            <label for="kategori" class="form-label">Nama Kategori</label>
            <input type="text" class="form-control {{ $errors->has('kategori') ? 'is-invalid' : '' }}" name="kategori"
              id="kategori" aria-describedby="helpId" placeholder="Masukan nama kategori ..."
              value="{{ old('kategori') }}">

            @error('kategori')
            <div id="kategori" class="invalid-feedback">
              {{ $message}}
            </div>
            @enderror
          </div>

          <button type="submit" class="btn btn-success">Tambah Data</button>

        </form>
      </div>
    </div>

    @error('kategoriedit')
    <div class="alert alert-danger mt-4" role="alert">
      gagal update data !
      {{ $message}}
    </div>
    @enderror
  </div>
</div>
@endsection