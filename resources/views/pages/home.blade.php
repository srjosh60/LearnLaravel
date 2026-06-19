@extends('layouts.app')
@section('title','Home')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <h1 class="display-4 mb-4">Halo, Saut Josua Romartua </h1>
         <img src="{{ asset('bootstrap-5.3.8-dist/images/foto.jpg') }}" alt="Foto Saut" class="rounded-circle" width="220" height="250">
            <p class="lead">Saya seorang mahasiswa yang bersemangat dan senang belajar teknologi baru.</p>
            <hr>
            <p>Selamat datang di web profile saya! Di sini Anda dapat menemukan informasi tentang proyek-proyek yang telah saya kerjakan, pengalaman kerja saya, dan cara untuk menghubungi saya.</p>
        </div>
    </div>
    <div class="row text-center mt-5 py-3">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Pengalaman</h5>
                    <p class="card-text">2 tahun pengalaman</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Projects</h5>
                    <p class="card-text">20 Projects Selesai</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Client</h5>
                    <p class="card-text">25 Client Puas</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection