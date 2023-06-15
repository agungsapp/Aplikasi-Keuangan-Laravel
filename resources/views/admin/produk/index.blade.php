@extends('layouts.main')
@section('content')
<div class="row">
  <div class="col-7">
    <div class="card shadow-md">
      <div class="card-header bg-primary text-white">
        <h3>Data Produk</h3>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">ID</th>
                <th scope="col">Nama produk</th>
                <th scope="col">Kategori</th>
                <th scope="col">Harga</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr class="">
                <td scope="row">R1C1</td>
                <td>R1C3</td>
                <td>R1C3</td>
                <td>R1C3</td>
                <td>Rp. 1.000.000</td>
                <td>
                  <a href="#" class="btn btn-warning">Edit</a>
                  <a href="#" class="btn btn-danger">Delete</a>
                </td>
              </tr>

            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>
  {{-- colom add data produk --}}
  <div class="col-5">
    <div class="card shadow-md">
      <div class="card-header bg-primary text-white">
        <h3>Tambah Data</h3>
      </div>
      <div class="card-body">
        <form action="">

          <div class="mb-3">
            <label for="produk" class="form-label">Nama produk</label>
            <input type="text" class="form-control" name="produk" id="produk" aria-describedby="helpId"
              placeholder="Masukan nama produk ...">
          </div>

          <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="number" class="form-control" name="harga" id="harga" aria-describedby="helpId"
              placeholder="Masukan nama harga ...">
          </div>

          <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <select id="kategori" name="kategori" class="custom-select">
              <option selected>-- pilih kategori --</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
          </div>



          <button class="btn btn-success mt-3">Tambah Data</button>

        </form>
      </div>
    </div>
  </div>
</div>

@endsection