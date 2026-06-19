@extends('layouts.admin')
@section('title', 'Edit Project')
@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold">Edit Project</h4>
    <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">← Kembali</a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-4">
        <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label fw-bold">Judul Project</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $project->title) }}">
                @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Deskripsi</label>
                <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="4">{{ old('description', $project->description) }}</textarea>
                @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Teknologi</label>
                <input type="text" name="teknologi" class="form-control @error('teknologi') is-invalid @enderror" value="{{ old('teknologi', $project->teknologi) }}">
                @error('teknologi')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Upload Gambar Baru</label>
                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" accept="image/*">
                <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar</small>
                @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Status</label>
                <select name="status" class="form-select @error('status') is-invalid @enderror">
                    <option value="">Pilih Status</option>
                    <option value="Selesai" {{ old('status', $project->status) == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                    <option value="On Progress" {{ old('status', $project->status) == 'On Progress' ? 'selected' : '' }}>On Progress</option>
                </select>
                @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-warning">Update Project</button>
                <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>

@endsection