@extends('layouts.app')
@section('title','About')
@section('content')

<!-- Hero Header -->
<div class="py-5 text-center" style="background: linear-gradient(135deg, #0a1628, #16235a); border-bottom: 1px solid rgba(255,255,255,0.1);">
    <h1 class="fw-bold mb-2" style="color: #d4af37; letter-spacing: 1px;">ABOUT</h1>
    <p class="text-light opacity-75 mb-0">Informasi tentang pemilik website ini</p>
</div>

<!-- Content -->
<div class="container py-5" style="background-color: #14161c; min-height: 60vh;">
    <div class="row justify-content-center">
        <div class="col-md-9 col-lg-7">

            <!-- Header Nama -->
            <div class="text-center py-5 px-4" style="background: linear-gradient(135deg, #16235a, #0a1628);">
                <h2 class="mb-3 fw-bold text-white">Saut Josua Romartua</h2>
                <span class="badge px-3 py-2" style="background-color: #d4af37; color: #0a1628; font-weight: 600;">
                    Mahasiswa Sistem Informasi
                </span>
            </div>

            <!-- Informasi Pribadi -->
            <div class="px-4 px-md-5 py-5">
                <h6 class="text-uppercase mb-4" style="color: #d4af37; letter-spacing: 1.5px; font-size: 0.8rem;">
                    Informasi Pribadi
                </h6>

                <div class="row">
                    <div class="col-md-4 mb-4">
                        <small class="text-secondary d-block mb-1">Jurusan</small>
                        <span class="text-light fw-semibold fs-5">Sistem Informasi</span>
                    </div>
                    <div class="col-md-4 mb-4">
                        <small class="text-secondary d-block mb-1">Universitas</small>
                        <span class="text-light fw-semibold fs-5">Universitas Pamulang</span>
                    </div>
                    <div class="col-md-4 mb-4">
                        <small class="text-secondary d-block mb-1">Hobi</small>
                        <span class="text-light fw-semibold fs-5">Berlari</span>
                    </div>
                </div>

                <h6 class="text-uppercase mb-3 mt-2" style="color: #d4af37; letter-spacing: 1.5px; font-size: 0.8rem;">
                    Tentang Saya
                </h6>
                <p class="text-light opacity-75 lh-lg mb-0" style="max-width: 600px;">
                    Saya adalah mahasiswa yang antusias belajar web development, terus mengasah kemampuan
                    dalam membangun aplikasi yang fungsional dan modern.
                </p>
            </div>

        </div>
    </div>
</div>
@endsection