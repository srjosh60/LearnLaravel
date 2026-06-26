@extends('admin.layouts.admin')
@section('title', 'Edit Foto Galeri')
@section('page-title', 'Edit Foto Galeri')
@section('content')

<div class="card card-stat p-4">
    <form action="{{ route('admin.gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="mb-3">
            <label class="form-label">Judul Foto</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $gallery->title) }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Caption</label>
            <input type="text" name="caption" class="form-control" value="{{ old('caption', $gallery->caption) }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Gambar</label><br>
            <img src="{{ asset('bootstrap-5.3.8-dist/images/' . $gallery->image) }}" width="120" class="mb-2 rounded">
            <input type="file" name="image" class="form-control" accept="image/*">
            <small class="text-muted">Kosongkan jika tidak ingin mengganti gambar.</small>
        </div>
        <button type="submit" class="btn btn-gold">Update Foto</button>
        <a href="{{ route('admin.gallery.index') }}" class="btn btn-outline-secondary ms-2">Batal</a>
    </form>
</div>

@endsection