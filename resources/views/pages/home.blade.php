@extends('layouts.app')
@section('title', 'Home - HSRM')
@section('content')

<style>
    .hero-section {
        background: linear-gradient(135deg, #081222 0%, #0a2a5e 100%);
        min-height: 85vh;
        display: flex;
        align-items: center;
        color: white;
    }
    .hero-title {
        font-size: 4rem;
        font-weight: 900;
        letter-spacing: 6px;
        color: #b19139;
    }
    .hero-subtitle {
        font-size: 1.2rem;
        color: #ccc;
        letter-spacing: 2px;
    }
    .stat-card {
        background: linear-gradient(135deg, #081222, #0a2a5e);
        color: white;
        border-radius: 15px;
        padding: 30px;
        text-align: center;
        transition: transform 0.3s;
    }
    .stat-card:hover { transform: translateY(-5px); }
    .stat-number {
        font-size: 2.5rem;
        font-weight: 900;
        color: #b19139;
    }
    .section-title {
        color: #081222;
        font-weight: 800;
        letter-spacing: 2px;
    }
    .gold-divider {
        width: 60px;
        height: 3px;
        background: #b19139;
        margin: 0 auto;
    }
    .product-card {
        border: none;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        transition: transform 0.3s, box-shadow 0.3s;
    }
    .product-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    }
    .product-card img {
        height: 280px;
        object-fit: contain;
        background: #f8f8f8;
    }
    .article-card {
        border: none;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        transition: transform 0.3s;
    }
    .article-card:hover { transform: translateY(-5px); }
    .article-card img {
        height: 200px;
        object-fit: cover;
        width: 100%;
    }
    .btn-gold {
        background: #b19139;
        color: white;
        border: none;
        font-weight: 600;
    }
    .btn-gold:hover { background: #9a7d30; color: white; }
    .price-tag { color: #b19139; font-weight: 700; }
</style>

{{-- HERO --}}
<div class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <p class="hero-subtitle mb-2">WELCOME TO</p>
                <h1 class="hero-title">HSRM</h1>
                <p class="hero-subtitle mb-4">Premium Street Fashion Brand</p>
                <p class="text-white-50 mb-4">Tampil elegan dengan koleksi fashion premium kami. Tersedia di Shopee, Tokopedia & TikTok Shop.</p>
                <a href="{{ route('products') }}" class="btn btn-gold btn-lg me-3">Shop Now</a>
                <a href="{{ route('about') }}" class="btn btn-outline-light btn-lg">About Us</a>
            </div>
            <div class="col-md-6 text-center">
                <img src="{{ asset('bootstrap-5.3.8-dist/images/logo.png') }}" alt="HSRM Logo" style="width: 85%; mix-blend-mode: screen;">
            </div>
        </div>
    </div>
</div>

{{-- STATS --}}
<div class="container my-5">
    <div class="row g-4">
        <div class="col-6 col-md-3">
            <div class="stat-card">
                <div class="stat-number">1000+</div>
                <p class="mb-0">Unit Terjual</p>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="stat-card">
                <div class="stat-number">500+</div>
                <p class="mb-0">Happy Customers</p>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="stat-card">
                <div class="stat-number">4.9⭐</div>
                <p class="mb-0">Rating Toko</p>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="stat-card">
                <div class="stat-number">2+</div>
                <p class="mb-0">Tahun Berdiri</p>
            </div>
        </div>
    </div>
</div>

{{-- FEATURED PRODUCTS --}}
@if($featuredProducts->count())
<div class="py-5" style="background: #f9f9f9;">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">PRODUK UNGGULAN</h2>
            <div class="gold-divider mt-2 mb-3"></div>
            <p class="text-muted">Koleksi terbaik pilihan kami</p>
        </div>
        <div class="row g-4">
            @foreach($featuredProducts as $product)
            <div class="col-md-4">
                <div class="card product-card h-100">
                    <img src="{{ $product->image ? asset('bootstrap-5.3.8-dist/images/' . $product->image) : asset('bootstrap-5.3.8-dist/images/logo.png') }}"
                         alt="{{ $product->name }}" class="card-img-top">
                    <div class="card-body">
                        <span class="badge mb-2" style="background:#0a1628;">{{ $product->category }}</span>
                        <h5 class="fw-bold">{{ $product->name }}</h5>
                        <p class="price-tag">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-gold w-100">Lihat Detail</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('products') }}" class="btn btn-outline-dark btn-lg px-5">Lihat Semua Produk</a>
        </div>
    </div>
</div>
@endif

{{-- WHY HSRM --}}
<div class="container my-5">
    <div class="text-center mb-5">
        <h2 class="section-title">Mengapa Memilih HSRM?</h2>
        <div class="gold-divider mt-2 mb-3"></div>
    </div>
    <div class="row g-4">
        <div class="col-md-4 text-center">
            <div class="p-4 border rounded shadow-sm h-100">
                <div style="font-size:2.5rem;">👕</div>
                <h5 class="mt-3 fw-bold" style="color:#081222;">Bahan Premium</h5>
                <p class="text-muted">Setiap produk menggunakan bahan pilihan berkualitas tinggi untuk kenyamanan maksimal.</p>
            </div>
        </div>
        <div class="col-md-4 text-center">
            <div class="p-4 border rounded shadow-sm h-100">
                <div style="font-size:2.5rem;">🚚</div>
                <h5 class="mt-3 fw-bold" style="color:#081222;">Pengiriman Cepat</h5>
                <p class="text-muted">Pengiriman ke seluruh Indonesia dengan estimasi 2-3 hari kerja.</p>
            </div>
        </div>
        <div class="col-md-4 text-center">
            <div class="p-4 border rounded shadow-sm h-100">
                <div style="font-size:2.5rem;">⭐</div>
                <h5 class="mt-3 fw-bold" style="color:#081222;">Terpercaya</h5>
                <p class="text-muted">Rating 4.9 di Shopee, Tokopedia & TikTok Shop dengan ratusan ulasan positif.</p>
            </div>
        </div>
    </div>
</div>

{{-- LATEST ARTICLES --}}
@if($latestArticles->count())
<div class="py-5" style="background: #081222;">
    <div class="container">
        <div class="text-center mb-5">
            <h2 style="color:#b19139; font-weight:800; letter-spacing:2px;">ARTIKEL TERBARU</h2>
            <div class="gold-divider mt-2 mb-3"></div>
            <p style="color:#ccc;">Tips dan inspirasi fashion terkini</p>
        </div>
        <div class="row g-4">
            @foreach($latestArticles as $article)
            <div class="col-md-4">
                <div class="card article-card h-100">
                    @if($article->image)
                    <img src="{{ asset('bootstrap-5.3.8-dist/images/' . $article->image) }}" alt="{{ $article->title }}">
                    @else
                    <div style="height:200px; background:#1a2d4a; display:flex; align-items:center; justify-content:center;">
                        <span style="color:#b19139; font-size:2rem;">📰</span>
                    </div>
                    @endif
                    <div class="card-body">
                        <small class="text-muted">{{ $article->created_at?->format('d M Y') }}</small>
                        <h6 class="fw-bold mt-1">{{ $article->title }}</h6>
                        <p class="text-muted small">{{ Str::limit($article->content, 80) }}</p>
                        <a href="{{ route('articles.show', $article->id) }}" class="btn btn-gold btn-sm">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('articles') }}" class="btn btn-outline-light btn-lg px-5">Lihat Semua Artikel</a>
        </div>
    </div>
</div>
@endif

@endsection
