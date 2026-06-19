@extends('layouts.admin')
@section('title', 'Dashboard Admin')
@section('content')

<h4 class="fw-bold mb-4">Dashboard</h4>

<div class="row g-4">
    <div class="col-md-4">
        <div class="card border-0 shadow-sm text-center p-4" style="background: #1a1a2e; color: white;">
            <div style="font-size: 3rem;">📁</div>
            <h3 class="fw-bold mt-2" style="color: #f5c518;">{{ \App\Models\Projects::count() }}</h3>
            <p class="mb-0">Total Projects</p>
        </div>
    </div>
</div>

@endsection