<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\AdminProjectController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Auth\AdminAuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/about', [AboutController::class, 'index'])->name('about');

// Public Projects
Route::get('/projects', [ProjectsController::class, 'index'])->name('projects');
Route::get('/projects/{id}', [ProjectsController::class, 'show'])->name('projects.show');

// Auth Routes
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.post');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// Admin Routes (Protected)
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // Projects
    Route::get('/projects', [AdminProjectController::class, 'index'])->name('projects.index');
    Route::get('/projects/create', [AdminProjectController::class, 'create'])->name('projects.create');
    Route::post('/projects', [AdminProjectController::class, 'store'])->name('projects.store');
    Route::get('/projects/{id}/edit', [AdminProjectController::class, 'edit'])->name('projects.edit');
    Route::put('/projects/{id}', [AdminProjectController::class, 'update'])->name('projects.update');
    Route::delete('/projects/{id}', [AdminProjectController::class, 'destroy'])->name('projects.destroy');
    Route::get('/projects/export-pdf', [AdminProjectController::class, 'exportPdf'])->name('projects.export-pdf');

    // Users
    Route::get('/users', [AdminUserController::class, 'index'])->name('users.index');
});