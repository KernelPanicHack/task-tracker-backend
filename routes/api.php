<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\VerifyEmailController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Api\PostsController;
use \App\Http\Controllers\Api\UserController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('register', [AuthController::class, 'register'])->name('api.register');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('email/resend', [AuthController::class, 'resendVerificationEmail']);
Route::get('/verify/{token}', [AuthController::class, 'verifyEmail']);

Route::get('/posts', [PostsController::class, 'index'])->name('api.posts')
->middleware(['auth:sanctum']); // can:update title

Route::get('users', [UserController::class, 'users'])->name('api.users');
Route::get('users/{user}', [UserController::class, 'show'])->name('api.users.show');
Route::put('users/{user}/update', [UserController::class, 'update'])->name('api.users.update');
Route::delete('users/{user}', [UserController::class, 'delete'])->name('api.users.delete');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('api.logout');
});
