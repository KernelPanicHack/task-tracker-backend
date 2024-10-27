<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\VerifyEmailController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Api\PostsController;
use \App\Http\Controllers\Api\UserController;
use \App\Http\Controllers\Api\TaskController;
use \App\Http\Controllers\Api\StateController;
use \App\Http\Controllers\Api\CommentController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('register', [AuthController::class, 'register'])->name('api.register');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('email/resend', [AuthController::class, 'resendVerificationEmail']);
Route::get('/verify/{token}', [AuthController::class, 'verifyEmail']);

Route::post('comment/{task}', [CommentController::class, 'create'])->name('api.comment.create');

Route::get('users', [UserController::class, 'users'])->name('api.users');
Route::get('users/{user}', [UserController::class, 'show'])->name('api.users.show');
Route::put('users/{user}/update', [UserController::class, 'update'])->name('api.users.update');
Route::delete('users/{user}', [UserController::class, 'delete'])->name('api.users.delete');
Route::get('role:user', [UserController::class, 'abra'])->name('api.role.abra');

Route::get('tasks', [TaskController::class, 'index'])->name('api.tasks');
Route::get('tasks/{task}', [TaskController::class, 'show'])->name('api.tasks.show');
Route::put('tasks/{task}/update_state', [TaskController::class, 'updateState'])->name('api.tasks.update_state');
Route::put('tasks/{task}/update', [TaskController::class, 'update'])->name('api.tasks.update');
Route::delete('tasks/{task}', [TaskController::class, 'delete'])->name('api.tasks.delete');
Route::post('tasks', [TaskController::class, 'create'])->name('api.tasks.create');

Route::get('states', [StateController::class, 'states'])->name('api.states');
Route::get('export-tasks', [TaskController::class, 'export'])->name('api.tasks.export');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('api.logout');
});
