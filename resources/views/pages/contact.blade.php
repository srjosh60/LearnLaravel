@extends('layouts.app')
@section('title', 'Contact - HSRM')
@section('content')

<style>
    .page-header {
        background: linear-gradient(135deg, #0a1628, #1a2d4a);
        color: white;
        padding: 60px 0;
    }
    .contact-icon {
        font-size: 2rem;
        color: #c9a84c;
    }
    .platform-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 12px 20px;
        border-radius: 10px;
        font-weight: 700;
        text-decoration: none;
        font-size: 0.95rem;
        transition: transform 0.2s;
    }
    .platform-btn:hover {
        transform: translateY(-3px);
    }
    .btn-shopee {
        background-color: #EE4D2D;
        color: white;
    }
    .btn-tiktok {
        background-color: #000000;
        color: white;
        border: 1px solid #555;
    }
    .btn-instagram {
        background: linear-gradient(45deg, #f09433, #e6683c, #dc2743, #cc2366, #bc1888);
        color: white;
    }
</style>

<div class="page-header">
    <div class="container text-center">
        <h1 style="color: #c9a84c; font-weight: 800; letter-spacing: 3px;">CONTACT US</h1>
        <p class="text-white-50">Hubungi kami untuk informasi lebih lanjut</p>
    </div>
</div>

<div class="container mt-5">
    <div class="row g-4 justify-content-center">

        {{-- Platform Cards --}}
        <div class="col-md-4">
            <div class="card border-0 shadow-sm p-4 text-center h-100">
                <div class="contact-icon">🛒</div>
                <h5 class="fw-bold mt-3">Shopee</h5>
                <p class="text-muted">Temukan produk kami di Shopee dengan penawaran terbaik.</p>
                <a href="https://id.shp.ee/FDtEduNC" target="_blank" class="platform-btn btn-shopee mx-auto">
                    🛒 Kunjungi Toko
                </a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm p-4 text-center h-100">
                <div class="contact-icon">🎵</div>
                <h5 class="fw-bold mt-3">TikTok Shop</h5>
                <p class="text-muted">Follow dan belanja langsung di TikTok Shop HSRM.</p>
                <a href="https://vt.tiktok.com/ZS9NbhxrayP94-G7yzB/" target="_blank" class="platform-btn btn-tiktok mx-auto">
                    🎵 Kunjungi Toko
                </a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm p-4 text-center h-100">
                <div class="contact-icon">📱</div>
                <h5 class="fw-bold mt-3">Instagram</h5>
                <p class="text-muted">Follow Instagram kami untuk update koleksi terbaru.</p>
                <a href="https://www.instagram.com/hsrm.official?igsh=ODY0M3pvajBiYTll" target="_blank" class="platform-btn btn-instagram mx-auto">
                    📱 Follow Kami
                </a>
            </div>
        </div>

        {{-- Informasi Kontak --}}
        <div class="col-md-6">
            <div class="card border-0 shadow-sm p-4 h-100">
                <h5 class="fw-bold mb-3" style="color: #0a1628;">Informasi Kontak</h5>
                <p><b style="color: #c9a84c;">📧 Email:</b> hsrm.official@gmail.com</p>
                <p><b style="color: #c9a84c;">📱 WhatsApp:</b> +62 85763309446</p>
                <p><b style="color: #c9a84c;">📍 Lokasi:</b> Karawaci, Tangerang</p>
                <p><b style="color: #c9a84c;">⏰ Jam Operasional:</b> Senin - Sabtu, 09.00 - 21.00 WIB</p>
            </div>
        </div>

        {{-- WhatsApp CTA --}}
        <div class="col-md-6">
            <div class="card border-0 shadow-sm p-4 h-100 text-center" style="background-color: #081222;">
                <h5 style="color: #c9a84c; font-weight: 800;">💬 Chat Langsung</h5>
                <p class="text-white-50 mb-4">Ada pertanyaan? Hubungi kami langsung via WhatsApp!</p>
                <a href="https://wa.me/6285763309446" target="_blank" class="btn btn-gold btn-lg">
                    💬 Chat WhatsApp
                </a>
            </div>
        </div>

    </div>
</div>

@endsection