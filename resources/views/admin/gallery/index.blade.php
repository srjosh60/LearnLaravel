@extends('admin.layouts.admin')
@section('title', 'Kelola Galeri')
@section('page-title', 'Kelola Galeri')
@section('content')

<div class="card card-stat p-3">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h6 class="fw-bold mb-0">Galeri Foto</h6>
        <a href="{{ route('admin.gallery.create') }}" class="btn btn-gold btn-sm">+ Tambah Foto</a>
    </div>
    <div class="row g-3">
        @forelse ($galleries as $gallery)
        <div class="col-md-3 col-6">
            <div class="card h-100">
                <img src="{{ asset('bootstrap-5.3.8-dist/images/' . $gallery->image) }}" style="width:100%; height:350px; object-fit:cover; object-position:top;">
                <div class="card-body p-2">
                    <p class="small fw-bold mb-1">{{ $gallery->title ?? '-' }}</p>
                    <p class="small text-muted mb-2">{{ $gallery->caption ?? '' }}</p>
                    <div class="d-flex gap-1">
                        <a href="{{ route('admin.gallery.edit', $gallery->id) }}" class="btn btn-sm btn-outline-primary flex-fill">Edit</a>
                        <form action="{{ route('admin.gallery.destroy', $gallery->id) }}" method="POST" onsubmit="return confirm('Hapus foto ini?');" class="flex-fill">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger w-100">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center text-muted py-4">Belum ada foto di galeri.</div>
        @endforelse
    </div>
    <div class="mt-3">{{ $galleries->links() }}</div>
</div>

@endsection