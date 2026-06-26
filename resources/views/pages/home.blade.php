@extends('layouts.app')
@section('title', 'Home - HSRM')
@section('content')

<style>
    .hero-section {
        background: linear-gradient(135deg, #081222 0%, #0a2a5e 100%);
        min-height: 80vh;
        display: flex;
        align-items: center;
        color: white;
    }
    .hero-title {
        font-size: 3.5rem;
        font-weight: 900;
        letter-spacing: 4px;
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
    }
    .stat-number {
        font-size: 2.5rem;
        font-weight: 900;
        color: #b19139;
    }
</style>

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
    <img src="{{ asset('bootstrap-5.3.8-dist/images/logo.png') }}" alt="HSRM Logo" style="width: 95%; mix-blend-mode: screen;">
</div>
        </div>
    </div>
</div>

<div class="container my-5">
    <div class="row g-4">
        <div class="col-md-3">
            <div class="stat-card">
                <div class="stat-number">1000+</div>
                <p class="mb-0">Unit Terjual</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card">
                <div class="stat-number">500+</div>
                <p class="mb-0">Happy Customers</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card">
                <div class="stat-number">4.9⭐</div>
                <p class="mb-0">Rating Toko</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card">
                <div class="stat-number">2+</div>
                <p class="mb-0">Tahun Berdiri</p>
            </div>
        </div>
    </div>
</div>

<div class="container my-5">
    <div class="row mb-4">
        <div class="col-12 text-center">
            <h2 style="color: #081222; font-weight: 800; letter-spacing: 2px;">Mengapa Memilih HSRM?</h2>
            <div class="mt-2 mb-4" style="width:60px; height:3px; background:#b19139; margin:0 auto;"></div>
        </div>
    </div>
    <div class="row g-4">
        <div class="col-md-4 text-center">
            <div class="p-4 border rounded shadow-sm h-100">
                <div style="font-size:2.5rem;">👕</div>
                <h5 class="mt-3 fw-bold" style="color: #081222;">Bahan Premium</h5>
                <p class="text-muted">Setiap produk menggunakan bahan pilihan berkualitas tinggi untuk kenyamanan maksimal.</p>
            </div>
        </div>
        <div class="col-md-4 text-center">
            <div class="p-4 border rounded shadow-sm h-100">
                <div style="font-size:2.5rem;">🚚</div>
                <h5 class="mt-3 fw-bold" style="color: #081222;">Pengiriman Cepat</h5>
                <p class="text-muted">Pengiriman ke seluruh Indonesia dengan estimasi 2-3 hari kerja.</p>
            </div>
        </div>
        <div class="col-md-4 text-center">
            <div class="p-4 border rounded shadow-sm h-100">
                <div style="font-size:2.5rem;">⭐</div>
                <h5 class="mt-3 fw-bold" style="color: #081222;">Terpercaya</h5>
                <p class="text-muted">Rating 4.9 di Shopee, Tokopedia & TikTok Shop dengan ratusan ulasan positif.</p>
            </div>
        </div>
    </div>
</div>

@endsection