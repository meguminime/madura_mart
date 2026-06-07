    @extends('be.master')

    @section('menu')
        @include('be.menu')
    @endsection

    @section('distributor')
        {{-- BAGIAN NAVBAR (LENGKAP SEPERTI CODE 1) --}}
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
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
                            <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-bell cursor-pointer"></i>
                            </a>
                            <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                                <li class="mb-2">
                                    <a class="dropdown-item border-radius-md" href="javascript:;">
                                        <div class="d-flex py-1">
                                            <div class="my-auto">
                                                <img src="{{ asset('be/assets/img/team-2.jpg') }}" class="avatar avatar-sm  me-3 ">
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
                                                <img src="{{ asset('be/assets/img/small-logos/logo-spotify.svg') }}" class="avatar avatar-sm bg-gradient-dark  me-3 ">
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
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        {{-- END NAVBAR --}}

        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                            <h6>{{ $title }} Data</h6>
                            <a href="{{ route('distributor.create') }}" class="btn btn-primary btn-sm mb-0"> Add New {{ $title }}</a>
                        </div>
                        
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-primary text-xs font-weight-bolder opacity-7">No.</th>
                                            <th class="text-uppercase text-primary text-xs font-weight-bolder opacity-7">Action</th>
                                            <th class="text-uppercase text-primary text-xs font-weight-bolder opacity-7">Distributor Name</th>
                                            <th class="text-uppercase text-primary text-xs font-weight-bolder opacity-7">Address</th>
                                            <th class="text-uppercase text-primary text-xs font-weight-bolder opacity-7">Phone Number</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($datas as $nmr => $data)
                                            <tr>
                                                <td class="text-xs font-weight-bold mb-0 ps-4">{{ $nmr + 1 . '.' }}</td>
                                                <td class="text-xs font-weight-bold mb-0">
                                                    <a href="{{ route('distributor.edit', $data->id) }}" class="me-2">
                                                        <img src="{{ asset('be/assets/img/icon/edit.png') }}" alt="edit" width="20">
                                                    </a>
                                                    <form action="{{ route('distributor.destroy', $data->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="border-0 bg-transparent p-0" onclick="hapus(event, this)">
                                                            <img src="{{ asset('be/assets/img/icon/trash.png') }}" alt="delete" width="20">
                                                        </button>
                                                    </form>
                                                </td>
                                                
                                                <td class="text-xs font-weight-bold mb-0">{{ $data->name_distributor }}</td>
                                                <td class="text-xs font-weight-bold mb-0">{{ $data->alamat_distributor }}</td>
                                                <td class="text-xs font-weight-bold mb-0">{{ $data->notelp_distributor }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- FOOTER (LENGKAP SEPERTI CODE 1) --}}
            <footer class="footer pt-3">
                <div class="container-fluid">
                    <div class="row align-items-center justify-content-lg-between">
                        <div class="col-lg-6 mb-lg-0 mb-4">
                            <div class="copyright text-center text-sm text-muted text-lg-start">
                                © <script>document.write(new Date().getFullYear())</script>,
                                made with <i class="fa fa-heart"></i> by
                                <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a>
                                for a better web.
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                                <li class="nav-item">
                                    <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative Tim</a>
                                </li>
                                <li class="nav-item">
                                    <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">About Us</a>
                                </li>
                                <li class="nav-item">
                                    <a href="https://www.creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <form action="" method="POST" id="frm">
            @csrf
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            @if (session('simpan'))
                Swal.fire({
                    icon: 'success',
                    title: 'Good Job!',
                    text: '{{ session('simpan') }}'
                });
            @endif
        </script>
        <script>
            @if (session('update'))
                Swal.fire({
                    icon: 'success',
                    title: 'Good Job!',
                    text: '{{ session('update') }}'
                });
            @endif
        </script>
        <script>
            function hapus(e, el) {
                e.preventDefault();
                Swal.fire({
                    title: 'Are you sure?',
                    text: "Once deleted, you will not be able to recover this data!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonClass: 'btn-danger',
                    confirmButtonText: 'Yes, delete it!',
                    closeOnConfirm: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        el.closest("form").submit();
                    }
                });
            }
        </script>
        <script>
            @if (session('hapus'))
                Swal.fire({
                    icon: 'success',
                    title: 'Deleted!',
                    text: '{{ session('hapus') }}'
                });
            @endif
            @if (session('forbidden'))
            Swal.fire({
                icon: 'error',
                title: 'Forbidden!',
                text: '{{ session('forbidden') }}'
            });
            @endif
        </script>
    @endsection