@extends('layouts.admin')
@section('title', 'Data Projects')
@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold">Data Projects</h4>
    <div class="d-flex gap-2">
        <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">+ Tambah Project</a>
        <a href="{{ route('admin.projects.export-pdf') }}" class="btn btn-danger">🖨️ Cetak PDF</a>
    </div>
</div>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

<div class="card border-0 shadow-sm">
    <div class="card-body">
        <table id="projectTable" class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Teknologi</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($projects as $index => $project)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>
                        @if($project->image)
                            @if(str_contains($project->image, '/'))
                            <img src="{{ Storage::url($project->image) }}" width="80" height="60" style="object-fit: cover; border-radius: 5px;">
                            @else
                            <img src="{{ asset('bootstrap-5.3.8-dist/images/' . $project->image) }}" width="80" height="60" style="object-fit: cover; border-radius: 5px;">
                            @endif
                        @else
                        <span class="text-muted">No Image</span>
                        @endif
                    </td>
                    <td>{{ $project->title }}</td>
                    <td>{{ $project->teknologi }}</td>
                    <td>{{ Str::limit($project->description, 50) }}</td>
                    <td>
                        <span class="badge {{ $project->status == 'Selesai' ? 'bg-success' : 'bg-warning text-dark' }}">
                            {{ $project->status }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin hapus?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function() {
        $('#projectTable').DataTable({
            pageLength: 10,
            language: {
                search: "Cari:",
                lengthMenu: "Tampilkan _MENU_ data",
                info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                paginate: {
                    first: "Pertama",
                    last: "Terakhir",
                    next: "Selanjutnya",
                    previous: "Sebelumnya"
                }
            }
        });
    });
</script>
@endpush

@endsection