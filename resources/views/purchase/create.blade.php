@extends('be.master')
@section('menu')
    @include('be.menu')
@endsection
@section('purchase')
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
        navbar-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">{{ $title }}</li>
                </ol>
                <h6 class="font-weight-bolder mb-0">{{ $title }}</h6>
            </nav>
            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                {{-- <div class="d-flex align-items-center">
                    <a href="{{ route('distributor.create') }}" class="btn bg-gradient-dark w-100 my-4 mb-4"> Add new Distributor</a>
                <div> --}}
                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                    <div class="input-group">
                        <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" placeholder="Type here...">
                    </div>
                </div>
                <ul class="navbar-nav  justify-content-end">
                    <li class="nav-item d-flex align-items-center">
                        <span class="nav-link text-body font-weight-bold px-0 me-2">
                    <i class="fa fa-user me-sm-1"></i>
                    <span class="d-sm-inline d-none">{{ Auth::user()->name }}</span>
                </span>
                <form method="POST" action="{{ route('logout') }}" class="d-flex align-items-center m-0">
                    @csrf
                    <button type="submit" class="nav-link text-body font-weight-bold px-0 border-0 bg-transparent cursor-pointer" title="Logout">
                        <i class="fas fa-sign-out-alt me-sm-1"></i>
                        <span class="d-sm-inline d-none">Logout</span>
                    </button>
                </form>
                    </li>
                    <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                            <div class="sidenav-toggler-inner">
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item px-3 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body p-0">
                            <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown pe-2 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-bell cursor-pointer"></i>
                        </a>
                        <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4"
                            aria-labelledby="dropdownMenuButton">
                            <li class="mb-2">
                                <a class="dropdown-item border-radius-md" href="javascript:;">
                                    <div class="d-flex py-1">
                                        <div class="my-auto">
                                            <img src="{{ asset('be/assets/img/team-2.jpg') }}"
                                                class="avatar avatar-sm  me-3 ">
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="text-sm font-weight-normal mb-1">
                                                <span class="font-weight-bold">New message</span> from Laur
                                            </h6>
                                            <p class="text-xs text-secondary mb-0 ">
                                                <i class="fa fa-clock me-1"></i>
                                                13 minutes ago
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="mb-2">
                                <a class="dropdown-item border-radius-md" href="javascript:;">
                                    <div class="d-flex py-1">
                                        <div class="my-auto">
                                            <img src="{{ asset('be/assets/img/small-logos/logo-spotify.svg') }}"
                                                class="avatar avatar-sm bg-gradient-dark  me-3 ">
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="text-sm font-weight-normal mb-1">
                                                <span class="font-weight-bold">New album</span> by Travis Scott
                                            </h6>
                                            <p class="text-xs text-secondary mb-0 ">
                                                <i class="fa fa-clock me-1"></i>
                                                1 day
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item border-radius-md" href="javascript:;">
                                    <div class="d-flex py-1">
                                        <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                                            <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1"
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <title>credit-card</title>
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF"
                                                        fill-rule="nonzero">
                                                        <g transform="translate(1716.000000, 291.000000)">
                                                            <g transform="translate(453.000000, 454.000000)">
                                                                <path class="color-background"
                                                                    d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z"
                                                                    opacity="0.593633743"></path>
                                                                <path class="color-background"
                                                                    d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z">
                                                                </path>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>
                                        </div>
                                        <div class="d-flex flex-column justify-content-center">
                                            <h6 class="text-sm font-weight-normal mb-1">
                                                Payment successfully completed
                                            </h6>
                                            <p class="text-xs text-secondary mb-0 ">
                                                <i class="fa fa-clock me-1"></i>
                                                2 days
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
        <!--- Main Bagian Kanan --->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Add New {{ $title }} Data</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <form id="form" action="{{ route('purchase.store') }}" method="POST">                                
                                @csrf
                                <div class="row ms-3 me-3">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="mb-3">
                                            <label for="no_nota" class="form-label">Invoive No</label>
                                            <input type="text" class="form-control" id="no_nota" name="no_nota" placeholder="Enter Invoice No" value="@if(isset(session('data')->no_nota)) {{ session('data')->no_nota }} @endif" maxlength="15">
                                        </div>
                                        <div class="mb-3">
                                            <label for="distributor" class="form-label">Distributor</label>
                                            <select class="form-select" id="distributor" name="id_distributor">
                                                <option value="">Select Distributor</option>
                                                @foreach ($distributors as $distributor)
                                                    <option value="{{ $distributor->id }}" 
                                                    @if (isset(session('data')->id_distributor) && session('data')->id_distributor == $distributor->id) 
                                                        selected 
                                                    @endif>
                                                    {{ $distributor->name_distributor }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="id_barang" class="form-label">Product</label>
                                            <select class="form-select" id="id_barang" name="id_barang">
                                                <option value="">Select Product</option>
                                                @foreach ($products as $product)
                                                    <option value="{{ $product->id }}" 
                                                    {{ old('id_barang') == $product->id ? 'selected' : '' }}>
                                                    {{ $product->nama_barang }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="harga_beli" class="form-label">Purchase Price</label>
                                            <input type="text" class="form-control" id="harga_beli" name="harga_beli" placeholder="Enter Purchase Price" value="{{ old('harga_beli') ? old('harga_beli') : 0 }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="margin_jual" class="form-label">Selling Margin</label>
                                            <input type="text" class="form-control" id="margin_jual" name="margin_jual" placeholder="Enter Selling Margin" value="{{ old('margin_jual') ? old('margin_jual') : 0 }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="mb-3">
                                            <label for="tgl_nota" class="form-label">Invoice Date</label>
                                            <input type="date" class="form-control" id="tgl_nota" name="tgl_nota" placeholder="Enter Invoice Date" value="@if(isset(session('data')->tgl_nota)) {{session('data')->tgl_nota}} @endif">
                                        </div>
                                        <div class="mb-3">
                                            <label for="harga_jual" class="form-label">Selling Price</label>
                                            <input type="text" class="form-control" id="harga_jual" name="harga_jual" placeholder="Enter Selling Price" value="{{ old('harga_jual') ? old('harga_jual') : 0 }}" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="jumlah_beli" class="form-label">Purchase Amount</label>
                                            <input type="text" class="form-control" id="jumlah_beli" name="jumlah_beli" placeholder="Enter Purchase Amount" value="{{ old('jumlah_beli') ? old('jumlah_beli') : 0 }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="subtotal" class="form-label">Sub total</label>
                                            <input type="text" class="form-control" id="subtotal" name="subtotal" placeholder="Enter Sub total" value="{{ old('subtotal') ? old('subtotal') : 0 }}" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="total_bayar" class="form-label">Total Pay</label>
                                            <input type="text" class="form-control" id="total_bayar" name="total_bayar" placeholder="Enter Total Pay" value="{{ old('total_bayar') ? old('total_bayar') : 0 }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row ms-3 me-3 mt-3">
                                    <div class="col-12">
                                        <div class="px-3 pb-3 text-end">
                                            <a href="{{ route('purchase.index') }}" class="btn bg-gradient-secondary me-3">Cancel</a>
                                            <button type="button" id="simpan" class="btn bg-gradient-primary"> Save New {{ $title }} Data </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer pt-3  ">
                <div class="container-fluid">
                    <div class="row align-items-center justify-content-lg-between">
                        <div class="col-lg-6 mb-lg-0 mb-4">
                            <div class="copyright text-center text-sm text-muted text-lg-start">
                                ©
                                <script>
                                    document.write(new Date().getFullYear())
                                </script>,
                                made with <i class="fa fa-heart"></i> by
                                <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative
                                    Tim</a>
                                for a better web.
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                                <li class="nav-item">
                                    <a href="https://www.creative-tim.com" class="nav-link text-muted"
                                        target="_blank">Creative Tim</a>
                                </li>
                                <li class="nav-item">
                                    <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted"
                                        target="_blank">About Us</a>
                                </li>
                                <li class="nav-item">
                                    <a href="https://www.creative-tim.com/blog" class="nav-link text-muted"
                                        target="_blank">Blog</a>
                                </li>
                                <li class="nav-item">
                                    <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted"
                                        target="_blank">License</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            <script>
                let btnSimpan = document.getElementById('simpan');
                let form = document.getElementById('form');
                let no_nota = document.getElementById('no_nota');
                let distributor = document.getElementById('distributor');
                let id_barang = document.getElementById('id_barang');
                let tgl_nota = document.getElementById('tgl_nota');
                let harga_beli = document.getElementById('harga_beli');
                let margin_jual = document.getElementById('margin_jual');
                let harga_jual = document.getElementById('harga_jual');
                let jumlah_beli = document.getElementById('jumlah_beli');
                let subtotal = document.getElementById('subtotal');
                let total_bayar = document.getElementById('total_bayar');
                btnSimpan.addEventListener('click', function() {
                    if(no_nota.value.trim() === '') {
                        no_nota.focus();
                        swal("Invalid!", "No Invoice Cannot Be Empty!", "error");
                    }
                    else if(distributor.value.trim() === '') {
                        distributor.focus();
                        swal("Invalid!", "You have to choose the Distributor!", "error");
                    }
                    else if(id_barang.value.trim() === '') { 
                        id_barang.focus();
                        swal("Invalid!", "You have to choose the Product!", "error");
                    }
                    else if(tgl_nota.value.trim() === '') {
                        tgl_nota.focus();
                        swal("Invalid!", "Purchase Date Cannot Be Empty!", "error");
                    }
                    else if(harga_beli.value.trim() === '') {
                        harga_beli.focus();
                        swal("Invalid!", "Purchase Price Cannot Be Empty!", "error");
                    }
                    else if(margin_jual.value.trim() === '') {
                        margin_jual.focus();
                        swal("Invalid!", "Selling Margin Cannot Be Empty!", "error");
                    }
                    else if(harga_jual.value.trim() === '') {
                        harga_jual.focus();
                        swal("Invalid!", "Selling Price Cannot Be Empty!", "error");
                    }
                    else if(jumlah_beli.value.trim() === '') {
                        jumlah_beli.focus();
                        swal("Invalid!", "Purchase Amount Cannot Be Empty!", "error");
                    }
                    else if(subtotal.value.trim() === '') {
                        subtotal.focus();
                        swal("Invalid!", "Subtotal Cannot Be Empty!", "error");
                    }
                    else if(total_bayar.value.trim() === '') {
                        total_bayar.focus();
                        swal("Invalid!", "Total Pay Cannot Be Empty!", "error");
                    }
                    else {
                        form.submit();
                    }
                });

                function hanyaAngka(evt) {
                    var charCode = (evt.which) ? evt.which : evt.keyCode;
                    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                        evt.preventDefault();
                    } else {
                        return true;
                    }
                };

                harga_beli.addEventListener('keypress', hanyaAngka);
                margin_jual.addEventListener('keypress', hanyaAngka);
                jumlah_beli.addEventListener('keypress', hanyaAngka);

                harga_beli.addEventListener('focus', function() {
                    if(harga_beli.value.trim() === '0') {
                        harga_beli.value = '';
                    }
                });

                harga_beli.addEventListener('blur', function() {
                    if(harga_beli.value.trim() === '') {
                        harga_beli.value = '0';
                    }
                });

                margin_jual.addEventListener('focus', function() {
                    if(margin_jual.value.trim() === '0') {
                        margin_jual.value = '';
                    }
                });

                margin_jual.addEventListener('blur', function() {
                    if(margin_jual.value.trim() === '') {
                        margin_jual.value = '0';
                    }
                });

                jumlah_beli.addEventListener('focus', function() {
                    if(jumlah_beli.value.trim() === '0') {
                        jumlah_beli.value = '';
                    }
                });

                jumlah_beli.addEventListener('blur', function() {
                    if(jumlah_beli.value.trim() === '') {
                        jumlah_beli.value = '0';
                    }
                });

                function hargaJual(hrg_beli, margin) {
                    return hrg_beli + (hrg_beli * (margin / 100));
                };
                
                function subTotal(hrg_beli, jml_beli) {
                    return hrg_beli * jml_beli;
                };

                function totalBayar(l) {
                    let total_bayar_lama;
                    @if(isset(session('data')->total_bayar))
                        total_bayar_lama = parseInt({{ session('data')->total_bayar }});
                    @else
                        total_bayar_lama = 0;
                    @endif
                    return total_bayar.value = parseInt(total_bayar_lama) + parseInt(subtotal.value);
                };

                harga_beli.addEventListener('keyup',  function() {
                if(harga_beli.value.trim() === '') {
                    harga_jual.value = hargaJual(0, parseInt(margin_jual.value));
                }
                else {
                    harga_jual.value = hargaJual(parseInt(harga_beli.value), parseInt(margin_jual.value));
                }
                });

                margin_jual.addEventListener('keyup',  function() {
                if(margin_jual.value.trim() === '') {
                    harga_jual.value = hargaJual(parseInt(harga_beli.value), 0);
                }
                else {
                    harga_jual.value = hargaJual(parseInt(harga_beli.value), parseInt(margin_jual.value));
                }
                });

                harga_beli.addEventListener('keyup', function() {
                    if(harga_beli.value == '') {
                        subtotal.value = subTotal(0, parseInt(jumlah_beli.value));
                        totalBayar.value = totalBayar();
                    }
                    else {
                        subtotal.value = subTotal(parseInt(harga_beli.value), parseInt(jumlah_beli.value));
                        @if(isset(session('data')->total_bayar))
                            total_bayar.value = parseInt({{ session('data')->total_bayar }}) + parseInt(subtotal.value);
                        @else
                            total_bayar.value = totalBayar();
                        @endif
                    }
                });

                jumlah_beli.addEventListener('keyup', function() {
                    if(jumlah_beli.value == '') {
                        subtotal.value = subTotal(parseInt(harga_beli.value), 0);
                        totalBayar.value = totalBayar();
                    }
                    else {
                        subtotal.value = subTotal(parseInt(harga_beli.value), parseInt(jumlah_beli.value));
                        @if(isset(session('data')->total_bayar))
                            total_bayar.value = parseInt({{ session('data')->total_bayar }}) + parseInt(subtotal.value);
                        @else
                            total_bayar.value = totalBayar();
                        @endif
                    }
                });
                    
                @if (session('success'))
                    swal({
                        title: "Success!",
                        text: "{{ session('success') }}",
                        type: "info",
                        showCancelButton: true,
                        confirmButtonClass: "btn-info",
                        confirmButtonText: "Add new item purchase data!",
                        cancelButtonText: "Back to purchase list!"
                        cancelButtonClass: "btn-secondary",
                        closeOnConfirm: true,
                    },
                function(isConfirm) {
                    if(isConfirm) {
                        no_nota.disabled = true;
                        tgl_nota.disabled = true;
                        distributor.disabled = true;
                    }
                    else {
                        window.location.href = "{{ route('purchase.index') }}";
                    }
                });
                @endif
            </script>
        </div>
    @endsection
