<?php

use App\Http\Controllers\Api\ProjectApiController;
use App\Http\Controllers\Api\UserApiController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    // Projects API
    Route::get('/projects', [ProjectApiController::class, 'index']);
    Route::get('/projects/{id}', [ProjectApiController::class, 'show']);
    Route::post('/projects', [ProjectApiController::class, 'store']);
    Route::put('/projects/{id}', [ProjectApiController::class, 'update']);
    Route::delete('/projects/{id}', [ProjectApiController::class, 'destroy']);

    // Users API
    Route::get('/users', [UserApiController::class, 'index']);
    Route::get('/users/{id}', [UserApiController::class, 'show']);
    Route::post('/users', [UserApiController::class, 'store']);
    Route::put('/users/{id}', [UserApiController::class, 'update']);
    Route::delete('/users/{id}', [UserApiController::class, 'destroy']);
});