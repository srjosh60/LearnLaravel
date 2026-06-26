@extends('admin.layouts.admin')
@section('title', 'Tambah Produk')
@section('page-title', 'Tambah Produk')
@section('content')

<div class="card card-stat p-4">
    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nama Produk <span class="text-danger">*</span></label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="description" class="form-control" rows="4">{{ old('description') }}</textarea>
        </div>
        <div class="row">
            <div class="col-md-4 mb-3">
                <label class="form-label">Harga (Rp) <span class="text-danger">*</span></label>
                <input type="number" step="0.01" min="0" name="price" class="form-control" value="{{ old('price') }}" required>
            </div>
            <div class="col-md-4 mb-3">
                <label class="form-label">Kategori</label>
                <input type="text" name="category" class="form-control" value="{{ old('category') }}" placeholder="Jaket, Kaos, dll">
            </div>
            <div class="col-md-4 mb-3">
                <label class="form-label">Status <span class="text-danger">*</span></label>
                <select name="status" class="form-select" required>
                    <option value="available" {{ old('status') == 'available' ? 'selected' : '' }}>Tersedia</option>
                    <option value="sold_out" {{ old('status') == 'sold_out' ? 'selected' : '' }}>Sold Out</option>
                    <option value="coming_soon" {{ old('status') == 'coming_soon' ? 'selected' : '' }}>Coming Soon</option>
                </select>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Gambar</label>
            <input type="file" name="image" class="form-control" accept="image/*">
        </div>
        <button type="submit" class="btn btn-gold">Simpan Produk</button>
        <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary ms-2">Batal</a>
    </form>
</div>

@endsection