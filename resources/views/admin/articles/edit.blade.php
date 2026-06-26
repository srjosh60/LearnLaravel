@extends('admin.layouts.admin')
@section('title', 'Edit Artikel')
@section('page-title', 'Edit Artikel')
@section('content')

<div class="card card-stat p-4">
    <form action="{{ route('admin.articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="mb-3">
            <label class="form-label">Judul Artikel <span class="text-danger">*</span></label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $article->title) }}" required>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Kategori</label>
                <input type="text" name="category" class="form-control" value="{{ old('category', $article->category) }}">
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Penulis</label>
                <input type="text" name="author" class="form-control" value="{{ old('author', $article->author) }}">
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Isi Artikel <span class="text-danger">*</span></label>
            <textarea name="content" class="form-control" rows="6" required>{{ old('content', $article->content) }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Gambar</label><br>
            @if ($article->image)
                <img src="{{ asset('bootstrap-5.3.8-dist/images/' . $article->image) }}" width="100" class="mb-2 rounded">
            @endif
            <input type="file" name="image" class="form-control" accept="image/*">
            <small class="text-muted">Kosongkan jika tidak ingin mengganti gambar.</small>
        </div>
        <button type="submit" class="btn btn-gold">Update Artikel</button>
        <a href="{{ route('admin.articles.index') }}" class="btn btn-outline-secondary ms-2">Batal</a>
    </form>
</div>

@endsection