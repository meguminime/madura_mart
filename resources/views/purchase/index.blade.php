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
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                            <h6>{{ $title }} Data</h6>
                            <a href="{{ route('purchase.create') }}" class="btn btn-primary btn-sm mb-0"> Add New {{ $title }}</a>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive">
                        <table class="table align-items-center mb-0">
                    <thead>
                    <tr>
                        <th class="text-uppercase text-primary text-xs font-weight-bolder opacity-7">No.</th>
                        <th class="text-uppercase text-primary text-xs font-weight-bolder opacity-7">No Invoice</th>
                        <th class="text-uppercase text-primary text-xs font-weight-bolder opacity-7">Invoice Date</th>
                        <th class="text-uppercase text-primary text-xs font-weight-bolder opacity-7">Distributor</th>
                        <th class="text-uppercase text-primary text-xs font-weight-bolder opacity-7">Product Name</th>
                        <th class="text-uppercase text-primary text-xs font-weight-bolder opacity-7">Image</th>
                        <th class="text-uppercase text-primary text-xs font-weight-bolder opacity-7">Product Type</th>
                        <th class="text-uppercase text-primary text-xs font-weight-bolder opacity-7">Expired Date</th>
                        <th class="text-uppercase text-primary text-xs font-weight-bolder opacity-7">Stock</th>
                        <th class="text-uppercase text-primary text-xs font-weight-bolder opacity-7">Selling Price</th>
                        <th class="text-uppercase text-primary text-xs font-weight-bolder opacity-7">Purchase Price</th>
                        <th class="text-uppercase text-primary text-xs font-weight-bolder opacity-7">Selling Margin</th>
                        <th class="text-uppercase text-primary text-xs font-weight-bolder opacity-7">Quantity</th>
                        <th class="text-uppercase text-primary text-xs font-weight-bolder opacity-7">Sub Total</th>
                        <th class="text-uppercase text-primary text-xs font-weight-bolder opacity-7">Total Pay</th>
                        <th class="text-uppercase text-primary text-xs font-weight-bolder opacity-7">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($datas as $nmr => $data)
                    <tr>
                        <td class="text-uppercase text-xs text-secondary mb-0 ps-4">{{$nmr + 1 . "."}}</td>
                        <td class="text-uppercase text-xs text-secondary mb-0 ps-4">{{$data->no_nota}}</td>
                        <td class="text-uppercase text-xs text-secondary mb-0 ps-4">{{$data->tgl_nota}}</td>
                        <td class="text-uppercase text-xs text-secondary mb-0 ps-4">{{$data->name_distributor}}</td>
                        <td class="text-uppercase text-xs text-secondary mb-0 ps-4">{{$data->nama_barang}}</td>
                        <td class="text-uppercase text-xs text-secondary mb-0 ps-4">
                            <img src="{{ asset('storage/'.$data->foto_barang) }}" class="img-thumbnail cursor-pointer" alt="gambar produk" width="50" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{ $data->id_purchases }}">
                        </td>
                        <td class="text-uppercase text-xs text-secondary mb-0 ps-4">{{$data->jenis_barang}}</td>
                        <td class="text-uppercase text-xs text-secondary mb-0 ps-4">{{$data->tgl_expired}}</td>
                        <td class="text-uppercase text-xs text-secondary mb-0 ps-4">{{$data->stok}}</td>                          <td class="text-uppercase text-xs text-secondary mb-0 ps-4">Rp. {{number_format($data->harga_jual, 0, ',', '.')}}</td>
                        <td class="text-uppercase text-xs text-secondary mb-0 ps-4">Rp. {{number_format($data->harga_beli, 0, ',', '.')}}</td>
                        <td class="text-uppercase text-xs text-secondary mb-0 ps-4">{{$data->margin_jual}}</td>
                        <td class="text-uppercase text-xs text-secondary mb-0 ps-4">{{$data->jumlah_beli}}</td>
                        <td class="text-uppercase text-xs text-secondary mb-0 ps-4">Rp. {{number_format($data->subtotal, 0, ',', '.')}}</td>
                        <td class="text-uppercase text-xs text-secondary mb-0 ps-4">Rp. {{number_format($data->total_bayar, 0, ',', '.')}}</td>
                        <td class="text-uppercase text-xs text-secondary mb-0 ps-4">
                            <a href="javascript:;" onclick="editPurchase({{ $data->id_purchases }})"><img src="{{asset('be/assets/img/icon/edit.png')}}" alt="edit" width="20"></a>
                            <a href="javascript:;" onclick="deletePurchase({{ $data->id_purchases }})"><img src="{{asset('be/assets/img/icon/trash.png')}}" alt="gambar sampah" width="20" class="cursor-pointer me-2" title="delete"></a>
                        </td>
                    </tr>
                    {{-- Modal Foto Produk --}}
                     <div class="modal fade" id="staticBackdrop{{ $data->id_purchases }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel{{ $data->id_purchases }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">{{ $data->nama_barang }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-center">
                                <img src="{{ asset('storage/' .$data->foto_barang) }}" alt="gambar produk" class="img-thumbnail cursor-pointer" width="75%">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                            </div>
                        </div>
                        </div>
                    @endforeach
                  </tbody>
                </table>
              </div>
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
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                // CSRF token for AJAX requests
                const csrfToken = '{{ csrf_token() }}';

                function editPurchase(id) {
                    Swal.fire({
                        title: "Password required!",
                        text: "Write your boss's password:",
                        input: "password",
                        showCancelButton: true,
                        confirmButtonColor: "#e91e8c",
                        confirmButtonText: "OK",
                        cancelButtonText: "CANCEL",
                        inputPlaceholder: "Enter password"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            if (!result.value) {
                                Swal.fire("Error!", "Password is required!", "error");
                                return;
                            }

                            // Validate password via AJAX
                            fetch("{{ route('purchase.validatePassword') }}", {
                                method: "POST",
                                headers: {
                                    "Content-Type": "application/json",
                                    "X-CSRF-TOKEN": csrfToken
                                },
                                body: JSON.stringify({ password: result.value })
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    Swal.fire({
                                        title: "Nice!",
                                        text: "Your password is correct!",
                                        icon: "success",
                                        confirmButtonColor: "#e91e8c",
                                        confirmButtonText: "OK"
                                    }).then(() => {
                                        window.location.href = "/purchase/" + id + "/edit";
                                    });
                                } else {
                                    Swal.fire("Error!", data.message, "error");
                                }
                            })
                            .catch(error => {
                                Swal.fire("Error!", "Something went wrong. Please try again.", "error");
                            });
                        }
                    });
                }

                function deletePurchase(id) {
                    Swal.fire({
                        title: "Password required!",
                        text: "Write your boss's password:",
                        input: "password",
                        showCancelButton: true,
                        confirmButtonColor: "#e91e8c",
                        confirmButtonText: "OK",
                        cancelButtonText: "CANCEL",
                        inputPlaceholder: "Enter password"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            if (!result.value) {
                                Swal.fire("Error!", "Password is required!", "error");
                                return;
                            }

                            // Validate password via AJAX
                            fetch("{{ route('purchase.validatePassword') }}", {
                                method: "POST",
                                headers: {
                                    "Content-Type": "application/json",
                                    "X-CSRF-TOKEN": csrfToken
                                },
                                body: JSON.stringify({ password: result.value })
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    // Show delete confirmation
                                    Swal.fire({
                                        title: "Are you sure want to delete?",
                                        text: "Your will not be able to recover this data!",
                                        icon: "warning",
                                        showCancelButton: true,
                                        confirmButtonColor: "#DD6B55",
                                        confirmButtonText: "YES, DELETE IT!",
                                        cancelButtonText: "CANCEL"
                                    }).then((deleteResult) => {
                                        if (deleteResult.isConfirmed) {
                                            // Delete via AJAX
                                            fetch("/purchase/" + id, {
                                                method: "DELETE",
                                                headers: {
                                                    "Content-Type": "application/json",
                                                    "X-CSRF-TOKEN": csrfToken
                                                }
                                            })
                                            .then(response => response.json())
                                            .then(resultData => {
                                                if (resultData.success) {
                                                    Swal.fire({
                                                        title: "Deleted!",
                                                        text: resultData.message,
                                                        icon: "success"
                                                    }).then(() => {
                                                        window.location.reload();
                                                    });
                                                } else {
                                                    Swal.fire("Error!", resultData.message, "error");
                                                }
                                            })
                                            .catch(error => {
                                                Swal.fire("Error!", "Something went wrong. Please try again.", "error");
                                            });
                                        }
                                    });
                                } else {
                                    Swal.fire("Error!", data.message, "error");
                                }
                            })
                            .catch(error => {
                                Swal.fire("Error!", "Something went wrong. Please try again.", "error");
                            });
                        }
                    });
                }

                @if (session('success'))
                    Swal.fire("Success!", "{{ session('success') }}", "success");
                @endif

                @if (session('error'))
                    Swal.fire("Error!", "{{ session('error') }}", "error");
                @endif
            </script>
        </div>
    @endsection
