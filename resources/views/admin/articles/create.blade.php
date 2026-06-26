@extends('admin.layouts.admin')
@section('title', 'Tambah Artikel')
@section('page-title', 'Tambah Artikel')
@section('content')

<div class="card card-stat p-4">
    <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Judul Artikel <span class="text-danger">*</span></label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Kategori</label>
                <input type="text" name="category" class="form-control" value="{{ old('category') }}" placeholder="Fashion, Tips, dll">
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Penulis</label>
                <input type="text" name="author" class="form-control" value="{{ old('author') }}">
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Isi Artikel <span class="text-danger">*</span></label>
            <textarea name="content" class="form-control" rows="6" required>{{ old('content') }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Gambar</label>
            <input type="file" name="image" class="form-control" accept="image/*">
        </div>
        <button type="submit" class="btn btn-gold">Simpan Artikel</button>
        <a href="{{ route('admin.articles.index') }}" class="btn btn-outline-secondary ms-2">Batal</a>
    </form>
</div>

@endsection