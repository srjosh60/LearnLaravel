@extends('layouts.app')
@section('title','Tambah Project')
@section('content')

<style>
    .page-header {
        background: linear-gradient(135deg, #001B44, #0a2a5e);
        color: white;
        padding: 60px 0;
    }
</style>

<div class="page-header">
    <div class="container text-center">
        <h1 style="color: #C5A059; font-weight: 800; letter-spacing: 3px;">TAMBAH PROJECT</h1>
        <p class="text-white-50">Tambahkan project baru</p>
    </div>
</div>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <form action="{{ route('projects.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-bold">Judul Project</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" placeholder="Masukkan judul project">
                            @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Deskripsi</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="4" placeholder="Masukkan deskripsi project">{{ old('description') }}</textarea>
                            @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Teknologi</label>
                            <input type="text" name="teknologi" class="form-control @error('teknologi') is-invalid @enderror" value="{{ old('teknologi') }}" placeholder="Contoh: PHP, Laravel, MySQL">
                            @error('teknologi')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Nama File Gambar</label>
                            <input type="text" name="image" class="form-control" value="{{ old('image') }}" placeholder="Contoh: project.png">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Status</label>
                            <select name="status" class="form-select @error('status') is-invalid @enderror">
                                <option value="">Pilih Status</option>
                                <option value="Selesai" {{ old('status') == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                                <option value="On Progress" {{ old('status') == 'On Progress' ? 'selected' : '' }}>On Progress</option>
                            </select>
                            @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-gold">Simpan Project</button>
                            <a href="{{ route('projects') }}" class="btn btn-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection