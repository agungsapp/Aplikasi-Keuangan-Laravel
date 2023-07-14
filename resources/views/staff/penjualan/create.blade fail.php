@extends('layouts.main')
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header text-white bg-primary">
        Buat Transaksi Baru
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-12">
            {{-- search non select --}}
            {{-- <div class="input-group mb-3">
              <input id="cari_produk" type="text" class="form-control" placeholder="Cari produk ..." aria-label="Recipient's username"
                aria-describedby="basic-addon2">
               
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                  Tambah Keranjang
                </button>
              </div>
            </div> --}}
            {{-- tampungan pencarian --}}
            {{-- <div id="produklist">                
                </div> --}}
            {{-- /search --}}


            {{-- search metode select2 --}}
            <div class="form-group">
              <select id="produk" class="form-control" name="produk" id="jenis_toples">
                <option selected class="text-center">-- pilih produk --</option>
                @foreach ($produk as $item)
                <option value="{{ $item->kode }}">{{$item->kode." | ". $item->name }}</option>
                @endforeach
              </select>
            </div>
            <button class="btn btn-primary">+ Tambah Keranjang</button>
            {{-- /search metode select2 --}}

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="mt-5 row">
  <div class="col-12">
    <div class="card">
      <div class="card-header text-white bg-primary">
        <i class="fa fa-shopping-cart" aria-hidden="true"></i> Keranjang
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table id="myTable" class="table table-hover">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Kode Produk</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Tipe Toples</th>
                <th scope="col">Qty</th>
                <th width="5%" scope="col">Jumlah</th>
                <th scope="col">Harga Satuan</th>
                <th scope="col">Total</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>KD-123</td>
                <td>Nastar</td>
                <td>Bulat</td>
                <td>Dus</td>
                <td>15</td>
                <td>Rp. 25.000</td>
                <td>Rp. 2.115.000</td>
                <td>
                  <a href="#" class="btn btn-danger">Hapus</a>
                </td>
              </tr>

              <tr>
                <th scope="row">1</th>
                <td>KD-123</td>
                <td>Nastar</td>
                <td>
                  {{-- select tipe toples --}}
                  <div class="form-group">
                    <select class="form-control" name="jenis_toples" id="jenis_toples">
                      <option class="text-center">-- pilih jenis toples --</option>
                      <option value="segi">SEGI</option>
                      <option value="bulat">BULAT</option>
                    </select>
                  </div>
                </td>
                <td>
                  {{-- select qty --}}
                  <div class="form-group">
                    <select class="form-control" name="qty" id="qty">
                      <option class="text-center">-- pilih jenis qty --</option>
                      <option value="toples">TOPLES</option>
                      <option value="dus">DUS</option>
                      <option value="paket">PAKET</option>

                    </select>
                  </div>
                </td>
                <td>
                  {{-- jumlah pembelian --}}
                  <div class="form-group">
                    <input type="number" class="form-control {{ $errors->has('jumlah_beli') ? 'is-invalid' : '' }}" id="jumlah_beli" placeholder="0" value="{{ old('jumlah_beli') }}" name="jumlah_beli">
                  </div>
                </td>
                <td>Rp. 25.000</td>
                <td>Rp. 2.115.000</td>
                <td>
                  <a href="#" class="btn btn-danger">Hapus</a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@push('scripts')
<script>
  let table = new DataTable('#myTable');

  // $(document).ready(function() {
  //   $('#cari_produk').on('keyup', function() {
  //     var nilaiInput = $(this).val();
  //     console.log(nilaiInput);
  //   });
  // });


  $(document).ready(function() {

    // load select2
    $('#produk').select2();


    $('#cari_produk').on('keyup', function() {
      var value = $(this).val();
      console.log(value);

      $.ajax({
        url: "{{ route('cariproduk') }}",
        type: 'GET',
        data: {
          'name': value
        },
        success: function(data) {
          $('#produklist').html(data);
        }
      })
    });

    $(document).on('click', 'li', function() {
      var value = $(this).text();
      $('#cari_produk').val(value);
      $('#produklist').html("");
    })
  })
</script>
@endpush