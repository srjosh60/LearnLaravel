@extends('layouts.app')
@section('title', 'Products - HSRM')
@section('content')

<style>
    .card-img-top {
        width: 100%;
        height: 350px;
        object-fit: contain;
        object-position: center;
        background-color: #fff;
    }
    .price-tag {
        color: #c9a84c;
        font-weight: 700;
        font-size: 1.1rem;
    }
    .page-header {
        background: linear-gradient(135deg, #0a1628, #1a2d4a);
        color: white;
        padding: 60px 0;
    }
</style>

<div class="page-header">
    <div class="container text-center">
        <h1 style="color: #c9a84c; font-weight: 800; letter-spacing: 3px;">OUR PRODUCTS</h1>
        <p class="text-white-50">Koleksi fashion premium HSRM</p>
    </div>
</div>

<div class="container mt-5">
    <div class="row g-4">
        @forelse ($products as $product)
        <div class="col-md-4">
            <div class="card shadow-sm h-100 border-0">
                <img src="{{ asset('bootstrap-5.3.8-dist/images/' . $product->image) }}" alt="{{ $product->name }}" class="card-img-top">
                <div class="card-body">
                    <span class="badge mb-2" style="background-color: #0a1628;">{{ $product->category }}</span>
                    <h5 class="card-title fw-bold">{{ $product->name }}</h5>
                    <p class="price-tag">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-gold w-100">Lihat Detail</a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-info text-center">Belum ada produk.</div>
        </div>
        @endforelse
    </div>
    <div class="d-flex justify-content-center mt-4">
        {{ $products->links() }}
    </div>
</div>

@endsection