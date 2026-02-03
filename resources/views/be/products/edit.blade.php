@extends('be.master')
@section('menu')
    @include('be.menu')
@endsection

@section('products')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>{{ $title }}</h6>
                    </div>
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-5 text-center mb-4 mb-md-0">
                                <div class="position-relative">
                                    @if($product->foto_barang)
                                        @if(str_starts_with($product->foto_barang, 'http'))
                                            <img src="{{ $product->foto_barang }}"
                                                 alt="Product Image"
                                                 class="img-fluid border-radius-lg shadow-sm"
                                                 style="max-height: 450px; width: 100%; object-fit: cover;">
                                        @else
                                            <img src="{{ asset('storage/' . $product->foto_barang) }}"
                                                 alt="Product Image"
                                                 class="img-fluid border-radius-lg shadow-sm"
                                                 style="max-height: 450px; width: 100%; object-fit: cover;">
                                        @endif
                                        <div class="mt-3 text-sm text-muted">
                                            <em>Current Product Image</em>
                                        </div>
                                    @else
                                        <img src="{{ asset('images/makise.png') }}"
                                             alt="Illustration"
                                             class="img-fluid border-radius-lg shadow-sm"
                                             style="max-height: 450px; width: 100%; object-fit: cover;">
                                        <div class="mt-3 text-sm text-muted">
                                            <em>Makise Kurisu 🎶</em>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="p-3">
                                    <form id="edit-form" role="form" action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <label>Kode Barang</label>
                                        <div class="mb-3">
                                            <input type="text" name="kd_barang" class="form-control"
                                                placeholder="Input Kode Barang" aria-label="KodeBarang"
                                                value="{{ $product->kd_barang }}" required>
                                        </div>

                                        <label>Nama Barang</label>
                                        <div class="mb-3">
                                            <input type="text" name="nama_barang" class="form-control @error('nama_barang') is-invalid @enderror"
                                                placeholder="Input Nama Barang" aria-label="NamaBarang"
                                                value="{{ old('nama_barang', $product->nama_barang) }}" required>
                                            @error('nama_barang')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <label>Jenis Barang</label>
                                        <div class="mb-3">
                                            <input type="text" name="jenis_barang" class="form-control"
                                                placeholder="Input Jenis Barang" aria-label="JenisBarang"
                                                value="{{ $product->jenis_barang }}" required>
                                        </div>

                                        <label>Tanggal Expired</label>
                                        <div class="mb-3">
                                            <input type="date" name="tgl_expired" class="form-control"
                                                aria-label="TanggalExpired"
                                                value="{{ $product->tgl_expired ? $product->tgl_expired->format('Y-m-d') : '' }}">
                                        </div>

                                        <label>Harga Jual</label>
                                        <div class="mb-3">
                                            <input type="number" name="harga_jual" class="form-control"
                                                placeholder="Input Harga Jual" aria-label="HargaJual" min="0"
                                                value="{{ $product->harga_jual }}">
                                        </div>

                                        <label>Stok</label>
                                        <div class="mb-3">
                                            <input type="number" name="stok" class="form-control"
                                                placeholder="Input Stok" aria-label="Stok" min="0"
                                                value="{{ $product->stok }}">
                                        </div>

                                        <label>Foto Barang</label>
                                        <div class="mb-3">
                                            <input type="file" name="foto_barang" class="form-control @error('foto_barang') is-invalid @enderror"
                                                aria-label="FotoBarang" accept="image/*">
                                            @if($product->foto_barang)
                                                <small class="text-muted">Current file: {{ basename($product->foto_barang) }}</small>
                                            @endif
                                            @error('foto_barang')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="text-end">
                                            <a href="#" onclick="confirmCancel(event)"
                                                class="btn bg-gradient-light mt-4 mb-0">Cancel</a>
                                            <button type="submit" class="btn bg-gradient-dark mt-4 mb-0">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
                </div>
            </div>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function confirmCancel(event) {
            event.preventDefault();
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Perubahan yang belum disimpan akan hilang!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#344767',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, batalkan!',
                cancelButtonText: 'Tidak'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ route('products.index') }}";
                }
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('edit-form');
            if (form) {
                form.addEventListener('submit', function(event) {
                    event.preventDefault();
                    Swal.fire({
                        title: 'Update Data?',
                        text: "Pastikan data yang diubah sudah benar.",
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#344767',
                        cancelButtonColor: '#82d616',
                        confirmButtonText: 'Ya, Update!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            this.submit();
                        }
                    });
                });
            }
        });

        @if (session('duplikat'))
        Swal.fire({
            title: 'Duplikasi Data!',
            text: "{{ session('duplikat') }}",
            icon: 'warning',
            confirmButtonColor: '#344767',
            confirmButtonText: 'OK'
        });
        @endif
    </script>
@endsection
