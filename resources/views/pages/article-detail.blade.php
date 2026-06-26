@extends('layouts.app')
@section('title', $article->title . ' - HSRM')
@section('content')

<style>
    .article-img {
        width: 100%;
        height: auto;
        border-radius: 10px;
    }
    .platform-card {
        background-color: #081222;
        border-radius: 15px;
        padding: 30px;
        text-align: center;
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

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <span class="badge mb-3" style="background-color: #081222; font-size: 0.9rem;">{{ $article->category }}</span>
            <h2 class="fw-bold mb-3">{{ $article->title }}</h2>
            <p class="text-muted">✍ {{ $article->author }} · {{ $article->created_at ? $article->created_at->format('d M Y') : '-' }}</p>
            <img src="{{ asset('bootstrap-5.3.8-dist/images/' . $article->image) }}" alt="{{ $article->title }}" class="article-img shadow mb-4">
            <div class="card border-0 shadow-sm p-4 mb-4">
                <p class="lead">{{ $article->content }}</p>
            </div>

            @if($article->id == 2)
            <div class="card border-0 shadow-sm p-4 mb-4 text-center" style="background-color: #081222; border-radius: 15px;">
                <h5 style="color: #b19139; font-weight: 800;">🎬 Video Mix & Match HSRM</h5>
                <p class="text-white-50 mb-3">Lihat cara mix & match outfit HSRM yang keren!</p>
                <a href="https://vt.tiktok.com/ZS9yhusHE/" target="_blank" class="btn btn-gold btn-lg">
                    🎵 Tonton di TikTok
                </a>
            </div>
            @endif

            <div class="platform-card mb-4">
                <h5 style="color: #b19139; font-weight: 800; letter-spacing: 2px;">TEMUKAN HSRM DI</h5>
                <div class="mt-2 mb-4" style="width:60px; height:2px; background:#b19139; margin:0 auto;"></div>
                <p class="text-white-50 mb-4">Belanja produk HSRM langsung di platform favorit kamu!</p>
                <div class="d-flex justify-content-center gap-3 flex-wrap">
                    <a href="https://id.shp.ee/FDtEduNC" target="_blank" class="platform-btn btn-shopee">
                        🛒 Shopee
                    </a>
                    <a href="https://vt.tiktok.com/ZS9NbhxrayP94-G7yzB/" target="_blank" class="platform-btn btn-tiktok">
                        🎵 TikTok Shop
                    </a>
                    <a href="https://www.instagram.com/hsrm.official?igsh=ODY0M3pvajBiYTll" target="_blank" class="platform-btn btn-instagram">
                        📱 Instagram
                    </a>
                </div>
            </div>

            <a href="{{ route('articles') }}" class="btn btn-gold w-100 mt-2">← Kembali ke Articles</a>
        </div>
    </div>
</div>

@endsection