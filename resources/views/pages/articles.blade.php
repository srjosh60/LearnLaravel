@extends('layouts.app')
@section('title', 'Articles - HSRM')
@section('content')

<style>
    .card-img-top {
        width: 100%;
        height: 250px;
        object-fit: cover;
        object-position: center;
    }
    .page-header {
        background: linear-gradient(135deg, #081222, #0a2a5e);
        color: white;
        padding: 60px 0;
    }
</style>

<div class="page-header">
    <div class="container text-center">
        <h1 style="color: #c9a84c; font-weight: 800; letter-spacing: 3px;">ARTICLES</h1>
        <p class="text-white-50">Berita & tips fashion terbaru dari HSRM</p>
    </div>
</div>

<div class="container mt-5">
    <div class="row g-4">
        @forelse ($articles as $article)
        <div class="col-md-6">
            <div class="card shadow-sm h-100 border-0">
                <img src="{{ asset('bootstrap-5.3.8-dist/images/' . $article->image) }}" alt="{{ $article->title }}" class="card-img-top">
                <div class="card-body">
                    <span class="badge mb-2" style="background-color: #0a1628;">{{ $article->category }}</span>
                    <h5 class="card-title fw-bold">{{ $article->title }}</h5>
                    <p class="text-muted small">✍ {{ $article->author }} · {{ $article->created_at ? $article->created_at->format('d M Y') : '-' }}</p>
                    <p class="text-muted">{{ Str::limit($article->content, 100) }}</p>
                    <a href="{{ route('articles.show', $article->id) }}" class="btn btn-gold">Baca Selengkapnya</a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-info text-center">Belum ada artikel.</div>
        </div>
        @endforelse
    </div>
    <div class="d-flex justify-content-center mt-4">
        {{ $articles->links() }}
    </div>
</div>

@endsection