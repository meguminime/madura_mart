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
                        <h6>Product Details</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h5>{{ $product->name }}</h5>
                                <p><strong>Serial Number:</strong> {{ $product->serial_number }}</p>
                                <p><strong>Type:</strong> {{ $product->type }}</p>
                                <p><strong>Expiration Date:</strong> {{ $product->expiration_date ? $product->expiration_date->format('Y-m-d') : '-' }}</p>
                                <p><strong>Price:</strong> {{ $product->price ? 'Rp ' . number_format($product->price, 0, ',', '.') : '-' }}</p>
                                <p><strong>Stock:</strong> {{ $product->stock ?? '-' }}</p>
                                @if($product->picture)
                                    <p><strong>Picture:</strong> <img src="{{ $product->picture }}" alt="Product Picture" style="max-width: 200px;"></p>
                                @endif
                            </div>
                        </div>
                        <div class="text-end">
                            <a href="{{ route('products.index') }}" class="btn bg-gradient-light mt-4 mb-0">Back to Products</a>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn bg-gradient-dark mt-4 mb-0">Edit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
