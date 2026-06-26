@extends('admin.layouts.admin')
@section('title', 'Kelola Artikel')
@section('page-title', 'Kelola Artikel')
@section('content')

<div class="card card-stat p-3">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h6 class="fw-bold mb-0">Daftar Artikel</h6>
        <a href="{{ route('admin.articles.create') }}" class="btn btn-gold btn-sm">+ Tambah Artikel</a>
    </div>
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead>
                <tr>
                    <th>Gambar</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Penulis</th>
                    <th class="text-end">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($articles as $article)
                <tr>
                    <td>
                        @if ($article->image)
                            <img src="{{ asset('bootstrap-5.3.8-dist/images/' . $article->image) }}" width="60" height="45" style="object-fit:cover; border-radius:6px;">
                        @else
                            <span class="text-muted small">-</span>
                        @endif
                    </td>
                    <td>{{ $article->title }}</td>
                    <td>{{ $article->category ?? '-' }}</td>
                    <td>{{ $article->author ?? '-' }}</td>
                    <td class="text-end">
                        <a href="{{ route('admin.articles.edit', $article->id) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                        <form action="{{ route('admin.articles.destroy', $article->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus artikel ini?');">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="5" class="text-center text-muted py-4">Belum ada artikel.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-2">{{ $articles->links() }}</div>
</div>

@endsection