<!DOCTYPE html>
<html lang="en">

<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>ERP | Admin</title>

		<!-- Custom fonts for this template-->
		<link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
		<link
				href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
				rel="stylesheet">

		<!-- Custom styles for this template-->
		<link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">

		{{-- data table css --}}
		<link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
		{{-- select 2 css --}}
		<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

</head>

<body id="page-top">

		<!-- Page Wrapper -->
		<div id="wrapper">

				<!-- Sidebar -->
				<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

						<!-- Sidebar - Brand -->
						<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
								<div class="sidebar-brand-icon rotate-n-15">
										<i class="fas fa-birthday-cake"></i>
								</div>
								<div class="sidebar-brand-text mx-3">Ny. Fifin <br> {{ Auth::user()->role }}</div>
						</a>

						<!-- Divider -->
						<hr class="sidebar-divider my-0">

						<!-- Nav Item - Dashboard -->
						<li class="nav-item {{ \Route::is('admin.dashboard.index') ? 'active' : '' }}"">
								<a class="nav-link" href="{{ route('admin.dashboard.index') }}">
										<i class="fas fa-fw fa-tachometer-alt"></i>
										<span>Dashboard</span></a>
						</li>

						<!-- Divider -->
						<hr class="sidebar-divider">



						{{-- <li class="nav-item {{ \Route::is('admin.kategori.index') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.kategori.index') }}">
          <i class="fas fa-fw fa-list"></i>
          <span>Kategori</span></a>
      </li> --}}

						{{-- menu admin only start !!!! --}}
						@if (Auth::user()->role === 'admin')
								{{-- master data start --}}
								<div class="sidebar-heading">
										MASTER DATA
								</div>


						@endif


						{{-- menu admin only end !!!! --}}

						{{-- <li class="nav-item">
        <a class="nav-link" href="suplier">
          <i class="fas fa-fw fa-box"></i>
          <span>Suplier</span></a>
      </li> --}}

						{{-- admin only start !!! --}}
						@if (Auth::user()->role === 'admin')
								<li class="nav-item {{ \Route::is('admin.produk.*') ? 'active' : '' }}">
										<a class="nav-link" href="{{ route('admin.produk.index') }}">
												<i class="fas fa-fw fa-boxes"></i>
												<span>Produk</span></a>
								</li>
								{{-- master data end --}}
						@endif


						{{-- admin only end!!! --}}

						{{-- manajemen stok start --}}
						{{--
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        MANAGEMENT STOK
      </div>
      <li class="nav-item">
        <a class="nav-link" href="index.html">
          <i class="fas fa-fw fa-store"></i>
          <span>Stok</span></a>
      </li> --}}
						{{-- manajemen stok end --}}

						{{-- transaksi bar start --}}
						<hr class="sidebar-divider">
						<div class="sidebar-heading">
								TRANSAKSI
						</div>
						<li class="nav-item {{ \Route::is('staff.penjualan.index') ? 'active' : '' }}">
								<a class="nav-link" href="{{ route('staff.penjualan.index') }}">
										<i class="fas fa-fw fa-arrow-up"></i>
										<span>Penjualan</span></a>
						</li>
						<li class="nav-item {{ \Route::is('staff.penjualan.create') ? 'active' : '' }}">
								<a class="nav-link" href="{{ route('staff.penjualan.create') }}">
										<i class="fas fa-fw fa-arrow-down"></i>
										<span>Transaksi Baru</span></a>
						</li>
						{{-- kategori colapse start --}}
						
						{{-- kategori colapse end --}}
						{{-- <li class="nav-item">
        <a class="nav-link" href="index.html">
          <i class="fas fa-fw fa-arrow-up"></i>
          <span>Produk keluar</span></a>
</li> --}}
						{{-- <li class="nav-item">
								<a class="nav-link" href="index.html">
										<i class="fas fa-fw fa-arrow-down"></i>
										<span>Permintaan produk</span></a>
						</li> --}}
						{{-- transaksi bar end --}}

						{{-- admin only start --}}
						@if (Auth::user()->role === 'admin')
								{{-- management user bar start --}}
								<hr class="sidebar-divider">
								<div class="sidebar-heading">
										MANAGEMENT USER
								</div>
								{{-- <li class="nav-item">
										<a class="nav-link" href="index.html">
												<i class="fas fa-fw fa-user-circle"></i>
												<span>Role</span></a>
								</li> --}}
								<li class="nav-item {{ \Route::is('admin.user.*') ? 'active' : '' }}">
										<a class="nav-link" href="{{ route('admin.user.index') }}">
												<i class="fas fa-fw fa-users"></i>
												<span>User</span></a>
								</li>
								{{-- management user bar end --}}
						@endif

						{{-- admin only end --}}
						{{-- laporan bar start --}}
						<hr class="sidebar-divider">
						<div class="sidebar-heading">
								LAPORAN
						</div>
						<li class="nav-item">
								<a class="nav-link" href="index.html">
										<i class="fas fa-fw fa-file"></i>
										<span>Laporan</span></a>
						</li>
						{{-- laporan bar end --}}

						<!-- Divider -->
						<hr class="sidebar-divider d-none d-md-block">

						<!-- Sidebar Toggler (Sidebar) -->
						<div class="d-none d-md-inline text-center">
								<button class="rounded-circle border-0" id="sidebarToggle"></button>
						</div>

				</ul>
				<!-- End of Sidebar -->

				<!-- Content Wrapper -->
				<div id="content-wrapper" class="d-flex flex-column">

						<!-- Main Content -->
						<div id="content">

								<!-- Topbar -->
								@include('layouts.partials.navbar')
								<!-- End of Topbar -->

								<!-- Begin Page Content -->
								<div class="container-fluid">
										{{-- @if (Session::has('success'))
          <div class="pt-3">
            <div class="alert alert-success" role="alert">
              {{ Session::get('success') }}
            </div>
          </div>
@endif --}}

										<!-- Page Heading -->
										@yield('content')

								</div>
								<!-- /.container-fluid -->

						</div>
						<!-- End of Main Content -->

						<!-- Footer -->
						<footer class="sticky-footer bg-white">
								<div class="container my-auto">
										<div class="copyright my-auto text-center">
												<span>Copyright &copy; Sanca-Dev {{ date('Y') }}</span>
										</div>
								</div>
						</footer>
						<!-- End of Footer -->

				</div>
				<!-- End of Content Wrapper -->

		</div>
		<!-- End of Page Wrapper -->

		<!-- Scroll to Top Button-->
		<a class="scroll-to-top rounded" href="#page-top">
				<i class="fas fa-angle-up"></i>
		</a>

		<!-- Logout Modal-->
		<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
				aria-hidden="true">
				<div class="modal-dialog" role="document">
						<div class="modal-content">
								<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Logout ?</h5>
										<button class="close" type="button" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">×</span>
										</button>
								</div>
								<div class="modal-body">Yakin akan keluar dari akun {{ Auth::user()->name }} ?</div>
								<div class="modal-footer">
										<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
										<a class="btn btn-primary" href="{{ url('logout') }}">Yakin</a>
								</div>
						</div>
				</div>
		</div>

		{{-- confirm delete --}}

		<!-- Bootstrap core JavaScript-->
		<script src="../assets/vendor/jquery/jquery.min.js"></script>
		<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

		<!-- Core plugin JavaScript-->
		<script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

		<!-- Custom scripts for all pages-->
		<script src="../assets/js/sb-admin-2.min.js"></script>

		{{-- script data tables --}}
		<script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>


		{{-- jquery un compress --}}
		<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
				crossorigin="anonymous"></script>

		{{-- select2 js --}}
		<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


		@if (\Route::is('admin.dashboard.index'))
		@endif

		@stack('scripts')
		{{-- sweet alert --}}
		@include('sweetalert::alert')


		<script>
				// format rupiah dari form input dengan id harga dan label dengan id label-rupiah
				$(document).ready(function() {
						// input modal
						$('#harga').on('input', function() {
								var value = $(this).val();
								if (value) {
										var formattedValue = formatRupiah(value);
										$('#label-rupiah').text('Harga : ' + formattedValue);
								} else {
										$('#label-rupiah').text('Harga : 0');
								}
						});

						function formatRupiah(angka) {
								var numberString = angka.toString().replace(/\D/g, '');
								var formattedNumber = new Intl.NumberFormat('id-ID', {
										style: 'currency',
										currency: 'IDR'
								}).format(numberString);
								return formattedNumber.substr(0, formattedNumber.length - 3);
						}
						// input create
						$('#harga-create').on('input', function() {
								var value = $(this).val();
								if (value) {
										var formattedValue = formatRupiah(value);
										$('#label-rupiah-create').text('Harga : ' + formattedValue);
								} else {
										$('#label-rupiah-create').text('Harga : 0');
								}
						});

						function formatRupiah(angka) {
								var numberString = angka.toString().replace(/\D/g, '');
								var formattedNumber = new Intl.NumberFormat('id-ID', {
										style: 'currency',
										currency: 'IDR'
								}).format(numberString);
								return formattedNumber.substr(0, formattedNumber.length - 3);
						}
				});

				function konfirmasiHapus() {
						confirm('Yakin akan menghapus data ?');
				}
		</script>

</body>

</html>
