@extends('be.master')
@section('menu')
    @include('be.menu')
@endsection

@section('purchases')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>{{ $title }}</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <form action="{{ route('purchases.store') }}" method="POST" id="purchaseForm">
                            @csrf
                            <div class="row px-4 py-3">
                                <div class="col-md-6">
                                    <label for="no_nota" class="form-label">Invoice No</label>
                                    <input type="text" class="form-control" id="no_nota" name="no_nota" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="tgl_nota" class="form-label">Purchase Date</label>
                                    <input type="date" class="form-control" id="tgl_nota" name="tgl_nota" required>
                                </div>
                            </div>
                            <div class="row px-4">
                                <div class="col-md-12">
                                    <label for="id_distributor" class="form-label">Distributor</label>
                                    <select class="form-control" id="id_distributor" name="id_distributor" required>
                                        <option value="">Select Distributor</option>
                                        @foreach($distributors as $distributor)
                                            <option value="{{ $distributor->id }}">{{ $distributor->nama_distributor }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="px-4 py-3">
                                <h6>Products</h6>
                                <div id="productRows">
                                    <div class="product-row row mb-3">
                                        <div class="col-md-3">
                                            <label class="form-label">Product Name</label>
                                            <select class="form-control product-select" name="products[0][id_barang]" required>
                                                <option value="">Select Product</option>
                                                @foreach($products as $product)
                                                    <option value="{{ $product->id }}">{{ $product->nama_barang }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Purchase Price</label>
                                            <input type="number" class="form-control purchase-price" name="products[0][harga_beli]" step="0.01" required>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Selling Margin</label>
                                            <input type="number" class="form-control selling-margin" name="products[0][margin_jual]" step="0.01" required>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Purchase Amount</label>
                                            <input type="number" class="form-control purchase-amount" name="products[0][jumlah_beli]" required>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="form-label">Subtotal</label>
                                            <input type="number" class="form-control subtotal" name="products[0][subtotal]" readonly>
                                        </div>
                                        <div class="col-md-1 d-flex align-items-end">
                                            <button type="button" class="btn btn-danger remove-row">Remove</button>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary" id="addProduct">Add Product</button>
                            </div>

                            <div class="row px-4">
                                <div class="col-md-12 text-end">
                                    <h5>Total Pay: <span id="totalPay">0</span></h5>
                                </div>
                            </div>

                            <div class="px-4 py-3 text-end">
                                <button type="submit" class="btn bg-gradient-dark mb-0">Save Purchase</button>
                                <a href="{{ route('purchases.index') }}" class="btn bg-gradient-secondary mb-0">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let rowIndex = 1;

        document.getElementById('addProduct').addEventListener('click', function() {
            const productRows = document.getElementById('productRows');
            const newRow = document.querySelector('.product-row').cloneNode(true);
            newRow.querySelectorAll('input, select').forEach(input => {
                input.name = input.name.replace('[0]', '[' + rowIndex + ']');
                input.value = '';
            });
            productRows.appendChild(newRow);
            rowIndex++;
        });

        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-row')) {
                if (document.querySelectorAll('.product-row').length > 1) {
                    e.target.closest('.product-row').remove();
                    calculateTotal();
                }
            }
        });

        document.addEventListener('input', function(e) {
            if (e.target.classList.contains('purchase-price') || e.target.classList.contains('purchase-amount')) {
                const row = e.target.closest('.product-row');
                const price = parseFloat(row.querySelector('.purchase-price').value) || 0;
                const amount = parseFloat(row.querySelector('.purchase-amount').value) || 0;
                const subtotal = price * amount;
                row.querySelector('.subtotal').value = subtotal.toFixed(2);
                calculateTotal();
            }
        });

        function calculateTotal() {
            let total = 0;
            document.querySelectorAll('.subtotal').forEach(sub => {
                total += parseFloat(sub.value) || 0;
            });
            document.getElementById('totalPay').textContent = total.toFixed(2);
        }
    </script>

@endsection
