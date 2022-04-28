<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PermissioinController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('/posts', PostController::class);

Route::middleware(['auth', 'role:admin'])->name('admin.')->prefix('/admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::post('/roles/{role}/permissions', [RoleController::class, 'assignPermissions'])->name('roles.permissions');
    Route::resource('/roles', RoleController::class);
    Route::resource('/permissions', PermissioinController::class);
    Route::resource('/users', UserController::class);
});


require __DIR__ . '/auth.php';
