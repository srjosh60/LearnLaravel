@extends('layouts.app')
@section('title','Projects')
@section('content')
<style>
    .card-img-top {
        width: 100%;
        height: 200px;
        object-fit: cover;
        object-position: center;
    }
    .page-header {
        background: linear-gradient(135deg, #001B44, #0a2a5e);
        color: white;
        padding: 60px 0;
    }
</style>

<div class="page-header">
    <div class="container text-center">
        <h1 style="color: #C5A059; font-weight: 800; letter-spacing: 3px;">PROJECTS</h1>
        <p class="text-white-50">Daftar project yang telah dikerjakan</p>
    </div>
</div>

<div class="container mt-5">

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    <div class="row mb-4">
        <div class="col-12 text-end">
            <a href="{{ route('admin.projects.index') }}" class="btn btn-gold">⚙️ Kelola Project</a>
        </div>
    </div>

    <div class="row text-center mt-2 py-3">
        @forelse ($projects as $project)
        <div class="col-md-4 mt-4 h-100">
            @if($project->image)
                @if(str_contains($project->image, '/'))
                <img src="{{ Storage::url($project->image) }}" alt="{{ $project->title }}" class="card-img-top">
                @else
                <img src="{{ asset('bootstrap-5.3.8-dist/images/' . $project->image) }}" alt="{{ $project->title }}" class="card-img-top">
                @endif
            @else
            <img src="{{ asset('bootstrap-5.3.8-dist/images/default.png') }}" alt="No Image" class="card-img-top">
            @endif
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $project->title }}</h5>
                    <p class="card-muted">Tech : {{ $project->teknologi }}</p>
                    <a href="{{ route('projects.show', $project->id) }}" class="btn btn-primary btn-sm">Lihat Detail</a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-lg-12">
            <div class="alert alert-info text-center">
                <h3>Belum ada project.</h3>
            </div>
        </div>
        @endforelse
    </div>
    <div class="row mt-4">
        <div class="col-md-12 d-flex justify-content-center">
            {{ $projects->links() }}
        </div>
    </div>
</div>

@endsection