@extends('layouts.app')
@section('title', 'About - HSRM')
@section('content')

<style>
    .page-header {
        background: linear-gradient(135deg, #0a1628, #1a2d4a);
        color: white;
        padding: 60px 0;
    }
</style>

<div class="page-header">
    <div class="container text-center">
        <h1 style="color: #c9a84c; font-weight: 800; letter-spacing: 3px;">ABOUT US</h1>
        <p class="text-white-50">Kenali lebih dekat brand HSRM</p>
    </div>
</div>

<div class="container mt-5">
    <div class="row g-4">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm p-4 h-100">
                <h4 class="fw-bold mb-3" style="color: #0a1628;">Tentang HSRM</h4>
                <p class="text-muted">HSRM adalah brand fashion streetwear premium asal Indonesia yang berdiri sejak 2024. Kami menghadirkan koleksi pakaian berkualitas tinggi dengan desain yang elegan dan modern.</p>
                <p class="text-muted">Setiap produk HSRM dirancang dengan penuh perhatian terhadap detail, menggunakan bahan-bahan premium pilihan untuk memberikan kenyamanan maksimal bagi pelanggan kami.</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border-0 shadow-sm p-4 h-100">
                <h4 class="fw-bold mb-3" style="color: #0a1628;">Visi & Misi</h4>
                <p><b style="color: #c9a84c;">Visi:</b></p>
                <p class="text-muted">Menjadi brand fashion streetwear terkemuka di Indonesia yang dikenal dengan kualitas premium dan desain inovatif.</p>
                <p><b style="color: #c9a84c;">Misi:</b></p>
                <ul class="text-muted">
                    <li>Menghadirkan produk fashion berkualitas tinggi dengan harga terjangkau</li>
                    <li>Memberikan pelayanan terbaik kepada pelanggan</li>
                    <li>Terus berinovasi dalam desain dan kualitas produk</li>
                </ul>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm p-4 text-center h-100">
                <div style="font-size:2.5rem;">🏪</div>
                <h5 class="fw-bold mt-3">Toko Kami</h5>
                <p class="text-muted">Tersedia di Shopee & TikTok Shop dengan rating bintang 5.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm p-4 text-center h-100">
                <div style="font-size:2.5rem;">👥</div>
                <h5 class="fw-bold mt-3">Tim Kami</h5>
                <p class="text-muted">Tim muda yang bersemangat dan berdedikasi tinggi dalam dunia fashion.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm p-4 text-center h-100">
                <div style="font-size:2.5rem;">🌟</div>
                <h5 class="fw-bold mt-3">Kualitas</h5>
                <p class="text-muted">Setiap produk melewati quality control ketat sebelum sampai ke tangan pelanggan.</p>
            </div>
        </div>
    </div>
</div>

@endsection