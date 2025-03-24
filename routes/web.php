<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\ModuleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubmoduleController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
        // route for profile
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
        //route for permission
        Route::resource('permission', PermissionController::class);
        Route::get('permission/{permissionId}/delete', [PermissionController::class, 'destroy']);
    
        //route for role
        Route::resource('role', RoleController::class);
        Route::get('role/{roleId}/delete', [RoleController::class, 'destroy']);
    
        //route for user
        Route::get('user/search/find', [UserController::class, 'find']);
        Route::get('user/search', [UserController::class, 'search']);
        Route::get('user/{userId}/create', [UserController::class, 'create']);
        Route::get('user/{userId}/delete', [UserController::class, 'destroy']);
        Route::resource('user', UserController::class);
    
        //route for employee
        Route::resource('employee', EmployeeController::class);
        Route::get('employee/{employeeId}/delete', [EmployeeController::class, 'destroy']);
        Route::get('/employee/search', [EmployeeController::class, 'search']);
    
        //route for organization
        Route::resource('organization', OrganizationController::class);
        Route::get('organization/{orgId}/delete', [OrganizationController::class, 'destroy']);
    
        //route for module
        Route::resource('module', ModuleController::class);
        Route::get('module/{orgId}/delete', [ModuleController::class, 'destroy']);
    
        //route for submodule
        Route::resource('submodule', SubmoduleController::class);
        Route::get('submodule/{orgId}/delete', [SubmoduleController::class, 'destroy']);
});

    //route for login
    Route::get('dashboard', [UserController::class, 'viewDashboard'])->middleware(['auth', 'verified'])->name('dashboard');


require __DIR__.'/auth.php';