@extends('admin.layouts.admin')
@section('title', 'Kelola Produk')
@section('page-title', 'Kelola Produk')
@section('content')

<div class="card card-stat p-3">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h6 class="fw-bold mb-0">Daftar Produk</h6>
        <a href="{{ route('admin.products.create') }}" class="btn btn-gold btn-sm">+ Tambah Produk</a>
    </div>
    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead>
                <tr>
                    <th>Gambar</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th class="text-end">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                <tr>
                    <td>
                        @if ($product->image)
                            <img src="{{ asset('bootstrap-5.3.8-dist/images/' . $product->image) }}" width="80" height="100" style="object-fit:cover; border-radius:6px;">
                        @else
                            <span class="text-muted small">-</span>
                        @endif
                    </td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category ?? '-' }}</td>
                    <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                    <td>
                        <span class="badge bg-{{ $product->status === 'available' ? 'success' : ($product->status === 'sold_out' ? 'danger' : 'secondary') }}">
                            {{ ucfirst(str_replace('_', ' ', $product->status)) }}
                        </span>
                    </td>
                    <td class="text-end">
                        <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus produk ini?');">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" class="text-center text-muted py-4">Belum ada produk.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-2">{{ $products->links() }}</div>
</div>

@endsection