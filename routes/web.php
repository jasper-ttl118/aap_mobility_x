<?php

use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::resource('permission', PermissionController::class);
Route::get('permission/{permissionId}/delete', [PermissionController::class, 'destroy']);

Route::resource('role', RoleController::class);
Route::get('role/{roleId}/delete', [RoleController::class, 'destroy']);
Route::get('role/{roldeId}/give-permission',[RoleController::class, 'addPermissionToRole']);
Route::put('role/{roldeId}/give-permission',[RoleController::class, 'givePermissionToRole']);

Route::resource('user', UserController::class);
Route::get('user/{userId}/delete', [UserController::class, 'destroy']);