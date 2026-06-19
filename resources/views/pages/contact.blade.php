@extends('layouts.app')
@section('title','Contact')
@section('content')

<!-- Hero Header -->
<div class="py-5 text-center" style="background: linear-gradient(135deg, #0a1628, #16235a); border-bottom: 1px solid rgba(255,255,255,0.1);">
    <h1 class="fw-bold mb-2" style="color: #d4af37; letter-spacing: 1px;">CONTACT</h1>
    <p class="text-light opacity-75 mb-0">Yuk terhubung, jangan ragu untuk menghubungi saya 😊</p>
</div>

<!-- Content -->
<div class="container py-5" style="background-color: #14161c; min-height: 60vh;">
    <div class="row justify-content-center">
        <div class="col-md-9 col-lg-7">

            <h6 class="text-uppercase mb-4" style="color: #d4af37; letter-spacing: 1.5px; font-size: 0.8rem;">
                Hubungi Saya
            </h6>

            <div class="d-flex align-items-center mb-4">
                <i class="bi bi-envelope-fill fs-4 me-3" style="color: #d4af37; width: 28px;"></i>
                <div>
                    <small class="text-secondary d-block mb-1">Email</small>
                    <a href="mailto:questlee@gmail.com" class="text-light fw-semibold fs-5 text-decoration-none">
                        questlee@gmail.com
                    </a>
                </div>
            </div>

            <div class="d-flex align-items-center mb-4">
                <i class="bi bi-instagram fs-4 me-3" style="color: #d4af37; width: 28px;"></i>
                <div>
                    <small class="text-secondary d-block mb-1">Instagram</small>
                    <a href="https://instagram.com/questlee_" target="_blank" class="text-light fw-semibold fs-5 text-decoration-none">
                        @questlee_
                    </a>
                </div>
            </div>

            <div class="d-flex align-items-center mb-5">
                <i class="bi bi-github fs-4 me-3" style="color: #d4af37; width: 28px;"></i>
                <div>
                    <small class="text-secondary d-block mb-1">GitHub</small>
                    <a href="https://github.com/jojo" target="_blank" class="text-light fw-semibold fs-5 text-decoration-none">
                        github.com/jojo
                    </a>
                </div>
            </div>

            <p class="text-light opacity-75 lh-lg mb-0">
                Jangan ragu untuk menghubungi saya kalau ada pertanyaan, kolaborasi, atau sekadar ingin berdiskusi seputar web development! 😊
            </p>

        </div>
    </div>
</div>
@endsection