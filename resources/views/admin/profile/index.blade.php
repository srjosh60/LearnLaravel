@extends('admin.layouts.admin')
@section('title', 'Profil Perusahaan')
@section('page-title', 'Profil Perusahaan')
@section('content')

<div class="card card-stat p-3">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h6 class="fw-bold mb-0">Data Profil Perusahaan</h6>
        <a href="{{ route('admin.profile.create') }}" class="btn btn-gold btn-sm">+ Tambah Profil</a>
    </div>
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead>
                <tr>
                    <th>Logo</th>
                    <th>Nama Perusahaan</th>
                    <th>Email</th>
                    <th>Telepon</th>
                    <th class="text-end">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($profiles as $profile)
                <tr>
                    <td>
                        @if ($profile->logo)
                            <img src="{{ asset('bootstrap-5.3.8-dist/images/' . $profile->logo) }}" width="50" height="50" style="object-fit:cover; border-radius:6px;">
                        @else
                            <span class="text-muted small">-</span>
                        @endif
                    </td>
                    <td>{{ $profile->company_name }}</td>
                    <td>{{ $profile->email ?? '-' }}</td>
                    <td>{{ $profile->phone ?? '-' }}</td>
                    <td class="text-end">
                        <a href="{{ route('admin.profile.edit', $profile->id) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                        <form action="{{ route('admin.profile.destroy', $profile->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus data profil ini?');">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="5" class="text-center text-muted py-4">Belum ada data profil perusahaan.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection