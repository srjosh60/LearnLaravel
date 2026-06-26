@extends('admin.layouts.admin')
@section('title', 'Dashboard')
@section('page-title', 'Dashboard')
@section('content')

<div class="row g-3 mb-4">
    <div class="col-md-3 col-6">
        <div class="card card-stat p-3">
            <div class="text-muted small">Total Artikel</div>
            <div class="fs-3 fw-bold" style="color:#001B44;">{{ $totalArticles }}</div>
            <a href="{{ route('admin.articles.index') }}" class="small text-decoration-none" style="color:#C5A059;">Kelola →</a>
        </div>
    </div>
    <div class="col-md-3 col-6">
        <div class="card card-stat p-3">
            <div class="text-muted small">Total Produk</div>
            <div class="fs-3 fw-bold" style="color:#001B44;">{{ $totalProducts }}</div>
            <a href="{{ route('admin.products.index') }}" class="small text-decoration-none" style="color:#C5A059;">Kelola →</a>
        </div>
    </div>
    <div class="col-md-3 col-6">
        <div class="card card-stat p-3">
            <div class="text-muted small">Total Foto Galeri</div>
            <div class="fs-3 fw-bold" style="color:#001B44;">{{ $totalGallery }}</div>
            <a href="{{ route('admin.gallery.index') }}" class="small text-decoration-none" style="color:#C5A059;">Kelola →</a>
        </div>
    </div>
    <div class="col-md-3 col-6">
        <div class="card card-stat p-3">
            <div class="text-muted small">Profil Perusahaan</div>
            <div class="fs-3 fw-bold" style="color:#001B44;">{{ $totalProfile }}</div>
            <a href="{{ route('admin.profile.index') }}" class="small text-decoration-none" style="color:#C5A059;">Kelola →</a>
        </div>
    </div>
</div>

<div class="card card-stat p-3 mb-4">
    <h6 class="fw-bold mb-3">Menu Cepat</h6>
    <div class="row g-2">
        <div class="col-md-3 col-6">
            <a href="{{ route('admin.articles.create') }}" class="btn btn-gold w-100">+ Tambah Artikel</a>
        </div>
        <div class="col-md-3 col-6">
            <a href="{{ route('admin.products.create') }}" class="btn btn-gold w-100">+ Tambah Produk</a>
        </div>
        <div class="col-md-3 col-6">
            <a href="{{ route('admin.gallery.create') }}" class="btn btn-gold w-100">+ Tambah Galeri</a>
        </div>
        <div class="col-md-3 col-6">
            <a href="{{ route('admin.reports.products') }}" class="btn btn-outline-dark w-100">🧾 Cetak PDF</a>
        </div>
    </div>
</div>

<div class="row g-3">
    <div class="col-md-6">
        <div class="card card-stat p-3">
            <h6 class="fw-bold mb-3">Artikel Terbaru</h6>
            @forelse ($latestArticles as $a)
                <div class="d-flex justify-content-between border-bottom py-2 small">
                    <span>{{ $a->title }}</span>
                    <span class="text-muted">{{ $a->created_at ? $a->created_at->format('d/m/Y') : '-' }}</span>
                </div>
            @empty
                <p class="text-muted small mb-0">Belum ada artikel.</p>
            @endforelse
        </div>
    </div>
    <div class="col-md-6">
        <div class="card card-stat p-3">
            <h6 class="fw-bold mb-3">Produk Terbaru</h6>
            @forelse ($latestProducts as $p)
                <div class="d-flex justify-content-between border-bottom py-2 small">
                    <span>{{ $p->name }}</span>
                    <span class="text-muted">Rp {{ number_format($p->price, 0, ',', '.') }}</span>
                </div>
            @empty
                <p class="text-muted small mb-0">Belum ada produk.</p>
            @endforelse
        </div>
    </div>
</div>

@endsection