@extends('admin.layouts.admin')
@section('title', 'Edit Profil Perusahaan')
@section('page-title', 'Edit Profil Perusahaan')
@section('content')

<div class="card card-stat p-4">
    <form action="{{ route('admin.profile.update', $profile->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="mb-3">
            <label class="form-label">Nama Perusahaan <span class="text-danger">*</span></label>
            <input type="text" name="company_name" class="form-control" value="{{ old('company_name', $profile->company_name) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="description" class="form-control" rows="3">{{ old('description', $profile->description) }}</textarea>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Visi</label>
                <textarea name="vision" class="form-control" rows="3">{{ old('vision', $profile->vision) }}</textarea>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Misi</label>
                <textarea name="mission" class="form-control" rows="3">{{ old('mission', $profile->mission) }}</textarea>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Alamat</label>
            <input type="text" name="address" class="form-control" value="{{ old('address', $profile->address) }}">
        </div>
        <div class="row">
            <div class="col-md-4 mb-3">
                <label class="form-label">Telepon/WhatsApp</label>
                <input type="text" name="phone" class="form-control" value="{{ old('phone', $profile->phone) }}">
            </div>
            <div class="col-md-4 mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $profile->email) }}">
            </div>
            <div class="col-md-4 mb-3">
                <label class="form-label">Instagram</label>
                <input type="text" name="instagram" class="form-control" value="{{ old('instagram', $profile->instagram) }}">
            </div>
        </div>
        <div class="mb-3">
            <label class="form-label">Logo</label><br>
            @if ($profile->logo)
                <img src="{{ asset('bootstrap-5.3.8-dist/images/' . $profile->logo) }}" width="80" class="mb-2 rounded">
            @endif
            <input type="file" name="logo" class="form-control" accept="image/*">
            <small class="text-muted">Kosongkan jika tidak ingin mengganti logo.</small>
        </div>
        <button type="submit" class="btn btn-gold">Update Profil</button>
        <a href="{{ route('admin.profile.index') }}" class="btn btn-outline-secondary ms-2">Batal</a>
    </form>
</div>

@endsection