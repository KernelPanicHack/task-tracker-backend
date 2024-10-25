<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\RolePermissionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'login'])->name('admin.login.submit');
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');

    Route::middleware('is_admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
        Route::get('/users/{id}/edit-roles', [AdminController::class, 'editUserRoles'])->name('admin.edit-user-roles');
        Route::put('/users/{id}/edit-roles', [AdminController::class, 'updateUserRoles'])->name('admin.update-user-roles');
        Route::get('/roles', [RolePermissionController::class, 'index'])->name('admin.roles');
        Route::post('/roles/create', [RolePermissionController::class, 'createRole'])->name('admin.create-role');
        Route::post('/permissions/create', [RolePermissionController::class, 'createPermission'])->name('admin.create-permission');
        Route::post('/roles/assign-permission', [RolePermissionController::class, 'assignPermission'])->name('admin.assign-permission');
        Route::get('/roles/permissions', [RolePermissionController::class, 'listRolesWithPermissions'])->name('admin.list-roles-permissions');

    });
});
