@extends('layouts.app')
@section('title', $product->name . ' - HSRM')
@section('content')

<style>
    .product-img {
        width: 100%;
        max-height: 500px;
        object-fit: contain;
        object-position: center;
        background-color: #fff;
        border-radius: 10px;
    }
    .price-tag {
        color: #c9a84c;
        font-weight: 800;
        font-size: 1.8rem;
    }
</style>

<div class="container mt-5">
    <div class="row g-5">
        <div class="col-md-6">
            <img src="{{ asset('bootstrap-5.3.8-dist/images/' . $product->image) }}" alt="{{ $product->name }}" class="product-img shadow">
        </div>
        <div class="col-md-6">
            <span class="badge mb-3" style="background-color: #0a1628; font-size: 0.9rem;">{{ $product->category }}</span>
            <h2 class="fw-bold">{{ $product->name }}</h2>
            <p class="price-tag">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
            <hr>
            <h5 class="fw-bold">Deskripsi Produk</h5>
            <p class="text-muted">{{ $product->description }}</p>
            <hr>
            <p><b>Status:</b>
                <span class="badge bg-success">{{ $product->status }}</span>
            </p>
            <a href="{{ route('products') }}" class="btn btn-gold w-100 mt-3">← Kembali ke Products</a>
        </div>
    </div>
</div>

@endsection