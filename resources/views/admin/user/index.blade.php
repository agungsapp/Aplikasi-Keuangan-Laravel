@extends('layouts.main')
@section('content')
<div class="row">
  <div class="col-9">
    <div class="card shadow-md">
      <div class="card-header bg-primary text-white">
        <h5>Data User</h5>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($data as $item)
              <tr class="">
                <td scope="row">{{ $loop->iteration }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->username }}</td>
                <td>{{ $item->email }}</td>
                <td>
                  <span class="badge px-3 {{ $item->role == 'admin' ? 'badge-danger' : 'badge-success' }}">{{
                    $item->role
                    }}</span>
                </td>
                <td>

                  {{-- button edit --}}
                  {{-- <a href="{{ route('admin.user.edit', $item->id) }}" class="btn btn-warning">Edit</a> --}}

                  {{-- form tombol delete --}}
                  <form class="d-inline" action="{{ route('admin.user.destroy', $item->id) }}" method="POST">
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
        <form action="{{ route($routestore) }}" method="POST">
          @csrf
          {{-- nama --}}
          <div class="mb-3">
            <label for="user" class="form-label">Nama user</label>
            <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" id="user"
              aria-describedby="helpId" placeholder="Masukan nama user ..." value="{{ old('name') }}">
            @error('name')
            <div id="name" class="invalid-feedback">
              {{ $message}}
            </div>
            @enderror
          </div>
          {{-- username --}}
          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}" name="username"
              id="username" aria-describedby="helpId" placeholder="Masukan username ..." value="{{ old('username') }}">
            @error('username')
            <div id="username" class="invalid-feedback">
              {{ $message}}
            </div>
            @enderror
          </div>
          {{-- email --}}
          <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email"
              id="email" aria-describedby="helpId" placeholder="Masukan email ..." value="{{ old('email') }}">
            @error('email')
            <div id="email" class="invalid-feedback">
              {{ $message}}
            </div>
            @enderror
          </div>
          {{-- password --}}
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
              name="password" id="password" aria-describedby="helpId" placeholder="Masukan password ..."
              value="{{ old('password') }}">
            @error('password')
            <div id="password" class="invalid-feedback">
              {{ $message}}
            </div>
            @enderror
          </div>
          {{-- password confirm --}}
          <div class="mb-3">
            {{-- <label for="password_confirm" class="form-label">Ulangi password</label> --}}
            <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
              name="password_confirmation" id="password_confirmation" aria-describedby="helpId"
              placeholder="Ulangi password ..." value="{{ old('password_confirmation') }}">
            @error('password_confirmation')
            <div id="password_confirmation" class="invalid-feedback">
              {{ $message}}
            </div>
            @enderror
          </div>


          {{-- role --}}
          <div class="mb-3">
            <label for="roles" class="form-label">Role</label>
            <select id="roles" name="roles" class="custom-select {{ $errors->has('roles') ? 'is-invalid' : '' }}">
              <option value="admin">Admin</option>
              <option selected value="staff">Staff</option>
            </select>
            @error('roles')
            <div id="roles" class="invalid-feedback">
              {{ $message}}
            </div>
            @enderror
          </div>


          <button class="btn btn-success mt-3">Tambah Data</button>

        </form>
      </div>
    </div>
    @error('nameedit')
    <div class="alert alert-danger mt-4" role="alert">
      gagal update data ! <br>
      {{ $message}}
    </div>
    @enderror
  </div>
</div>

@endsection