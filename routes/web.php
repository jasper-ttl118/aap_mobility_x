<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('permission', PermissionController::class);
    Route::get('permission/{permissionId}/delete', [PermissionController::class, 'destroy']);

    Route::get('role/add-role-with-permissions', [RoleController::class, 'addRoleWithPermissions']);
    Route::put('role/save-role-with-permissions', [RoleController::class, 'saveRoleWithPermissions']);

    Route::get('role/{roldeId}/update-role-with-permissions', [RoleController::class, 'updateRoleWithPermissions']);
    Route::put('role/{roldeId}/edit-role-with-permissions', [RoleController::class, 'editRoleWithPermissions']);

    Route::resource('role', RoleController::class);
    Route::get('role/{roleId}/delete', [RoleController::class, 'destroy']);
    Route::get('role/{roldeId}/give-permission',[RoleController::class, 'addPermissionToRole']);
    Route::put('role/{roldeId}/give-permission',[RoleController::class, 'givePermissionToRole']);

    Route::resource('user', UserController::class);
    Route::get('user/{userId}/delete', [UserController::class, 'destroy']);

});

Route::get('/dashboard', [UserController::class, 'viewDashboard'])->middleware(['auth', 'verified'])->name('dashboard');


require __DIR__.'/auth.php';