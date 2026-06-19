@extends('layouts.app')
@section('title','Projects Detail')
@section('content')
<style>
    .card-img-top {
        width: 100%;
        max-height: 400px;
        object-fit: cover;
        object-position: center;
    }
</style>
<div class="container mt-5">
    <div class="row justify-content-center py-3">
        <div class="col-md-8 mt-4">
            <div class="card shadow-sm">
                @if($project->image && str_contains($project->image, '/'))
                <img src="{{ Storage::url($project->image) }}" alt="{{ $project->title }}" class="card-img-top">
                @elseif($project->image)
                <img src="{{ asset('bootstrap-5.3.8-dist/images/' . $project->image) }}" alt="{{ $project->title }}" class="card-img-top">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $project->title }}</h5>
                    <div class="mb-4">
                        <h5>Deskripsi Projects</h5>
                        <p class="card-text lead">{{ $project->description }}</p>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-4">
                                <h5>Teknologi Yang Digunakan</h5>
                                <p class="card-text">{{ $project->teknologi }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-4">
                                <h5>Status</h5>
                                <p class="card-text">{{ $project->status }}</p>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('projects') }}" class="btn btn-primary w-100">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection