@extends('admin.layouts.admin')
@section('title', 'Tambah Foto Galeri')
@section('page-title', 'Tambah Foto Galeri')
@section('content')

<div class="card card-stat p-4">
    <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Judul Foto</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Caption</label>
            <input type="text" name="caption" class="form-control" value="{{ old('caption') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Gambar <span class="text-danger">*</span></label>
            <input type="file" name="image" class="form-control" accept="image/*" required>
        </div>
        <button type="submit" class="btn btn-gold">Simpan Foto</button>
        <a href="{{ route('admin.gallery.index') }}" class="btn btn-outline-secondary ms-2">Batal</a>
    </form>
</div>

@endsection