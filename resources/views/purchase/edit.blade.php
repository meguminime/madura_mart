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
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="{{ route('purchase.index') }}">{{ $title }}</a></li>
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Edit</li>
                </ol>
                <h6 class="font-weight-bolder mb-0">Edit {{ $title }}</h6>
            </nav>
            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                    <div class="input-group">
                        <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" placeholder="Type here...">
                    </div>
                </div>
                <ul class="navbar-nav  justify-content-end">
                    <li class="nav-item d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body font-weight-bold px-0">
                            <i class="fa fa-user me-sm-1"></i>
                            <span class="d-sm-inline d-none">Sign In</span>
                        </a>
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
                            <h6>Edit {{ $title }} Data</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <form id="form" action="{{ route('purchase.update', $data->id_purchases) }}" method="POST">                                
                                @csrf
                                @method('PUT')
                                <div class="row ms-3 me-3">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="mb-3">
                                            <label for="no_nota" class="form-label">Invoice No</label>
                                            <input type="text" class="form-control" id="no_nota" name="no_nota" placeholder="Enter Invoice No" value="{{ $data->no_nota }}" maxlength="20">
                                        </div>
                                        <div class="mb-3">
                                            <label for="distributor" class="form-label">Distributor</label>
                                            <select class="form-select" id="distributor" name="id_distributor">
                                                <option value="">Select Distributor</option>
                                                @foreach ($distributors as $distributor)
                                                    <option value="{{ $distributor->id }}" 
                                                    @if ($data->id_distributor == $distributor->id) 
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
                                                    @if ($data->id_barang == $product->id) 
                                                        selected 
                                                    @endif>
                                                    {{ $product->nama_barang }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="harga_beli" class="form-label">Purchase Price</label>
                                            <input type="text" class="form-control" id="harga_beli" name="harga_beli" placeholder="Enter Purchase Price" value="{{ $data->harga_beli }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="margin_jual" class="form-label">Selling Margin</label>
                                            <input type="text" class="form-control" id="margin_jual" name="margin_jual" placeholder="Enter Selling Margin" value="{{ $data->margin_jual }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="mb-3">
                                            <label for="tgl_nota" class="form-label">Invoice Date</label>
                                            <input type="date" class="form-control" id="tgl_nota" name="tgl_nota" placeholder="Enter Invoice Date" value="{{ $data->tgl_nota }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="harga_jual" class="form-label">Selling Price</label>
                                            <input type="text" class="form-control" id="harga_jual" name="harga_jual" placeholder="Enter Selling Price" value="{{ $data->harga_jual }}" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="jumlah_beli" class="form-label">Quantity</label>
                                            <input type="text" class="form-control" id="jumlah_beli" name="jumlah_beli" placeholder="Enter Quantity" value="{{ $data->jumlah_beli }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="subtotal" class="form-label">Sub Total</label>
                                            <input type="text" class="form-control" id="subtotal" name="subtotal" placeholder="Enter Sub total" value="{{ $data->subtotal }}" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="total_bayar" class="form-label">Total Payment</label>
                                            <input type="text" class="form-control" id="total_bayar" name="total_bayar" placeholder="Enter Total Pay" value="{{ $data->total_bayar }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row ms-3 me-3 mt-3">
                                    <div class="col-12">
                                        <div class="px-3 pb-3 text-end">
                                            <a href="{{ route('purchase.index') }}" class="btn bg-gradient-secondary me-3">Cancel</a>
                                            <button type="button" id="simpan" class="btn bg-gradient-primary"> Edit This Purchase </button>
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
                    else if(harga_beli.value.trim() === '' || harga_beli.value.trim() === '0') {
                        harga_beli.focus();
                        swal("Invalid!", "Purchase Price Cannot Be Empty!", "error");
                    }
                    else if(jumlah_beli.value.trim() === '' || jumlah_beli.value.trim() === '0') {
                        jumlah_beli.focus();
                        swal("Invalid!", "Quantity Cannot Be Empty!", "error");
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

                // Auto-calculate selling price based on purchase price + margin
                function hargaJual(hrg_beli, margin) {
                    return hrg_beli + (hrg_beli * (margin / 100));
                };
                
                function subTotal(hrg_beli, jml_beli) {
                    return hrg_beli * jml_beli;
                };

                harga_beli.addEventListener('keyup', function() {
                    if(harga_beli.value.trim() === '') {
                        harga_jual.value = hargaJual(0, parseInt(margin_jual.value));
                        subtotal.value = subTotal(0, parseInt(jumlah_beli.value));
                    }
                    else {
                        harga_jual.value = hargaJual(parseInt(harga_beli.value), parseInt(margin_jual.value));
                        subtotal.value = subTotal(parseInt(harga_beli.value), parseInt(jumlah_beli.value));
                    }
                });

                margin_jual.addEventListener('keyup', function() {
                    if(margin_jual.value.trim() === '') {
                        harga_jual.value = hargaJual(parseInt(harga_beli.value), 0);
                    }
                    else {
                        harga_jual.value = hargaJual(parseInt(harga_beli.value), parseInt(margin_jual.value));
                    }
                });

                jumlah_beli.addEventListener('keyup', function() {
                    if(jumlah_beli.value.trim() === '') {
                        subtotal.value = subTotal(parseInt(harga_beli.value), 0);
                    }
                    else {
                        subtotal.value = subTotal(parseInt(harga_beli.value), parseInt(jumlah_beli.value));
                    }
                });

                @if (session('success'))
                    swal("Success!", "{{ session('success') }}", "success");
                @endif
            </script>
        </div>
    @endsection
