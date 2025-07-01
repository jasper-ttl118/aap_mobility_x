<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CorporateController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RequisitionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\ModuleController;
use App\Livewire\Test;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubmoduleController;
use App\Http\Controllers\NoteController;

use App\Http\Controllers\CalendarController;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

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
        Route::post('/user/get-role', [UserController::class, 'displayRoleAccess']);
        Route::post('/user/{id}/update-status', [UserController::class, 'updateStatus']);

        Route::get('user/search/find', [UserController::class, 'find']);
        Route::get('user/search', [UserController::class, 'search']);
        Route::get('user/{userId}/create', [UserController::class, 'create']);
        Route::get('user/{userId}/delete', [UserController::class, 'destroy']);
        Route::resource('user', UserController::class);
    
        //route for employee
        Route::get('/employee/manpower-requisition', [EmployeeController::class, 'manpowerRequisition'])->name('manpower-requisition');
        Route::get('/employee/vacancy-list', [EmployeeController::class, 'vacancyList'])->name('vacancy-list');
        Route::resource('employee', EmployeeController::class);
        Route::get('employee/{employeeId}/delete', [EmployeeController::class, 'destroy'])->name("employee.delete");
        Route::get('/employee/search', [EmployeeController::class, 'search']);
        Route::get('/employee/alphalist/view-employee-profile', [CustomerController::class,'employeeProfile'])->name('employeeProfile');
    
        //route for organization
        Route::resource('organization', OrganizationController::class);
        Route::get('organization/{orgId}/delete', [OrganizationController::class, 'destroy']);
    
        //route for module
        Route::resource('module', ModuleController::class);
        Route::get('module/{orgId}/delete', [ModuleController::class, 'destroy']);
    
        //route for submodule
        Route::resource('submodule', SubmoduleController::class);
        Route::get('submodule/{orgId}/delete', [SubmoduleController::class, 'destroy']);

        // route for customers (CRM)
        Route::get('/customer/contacts', [CustomerController::class, 'contacts'])->name('contacts');

        // Routes for email marketing submodule (CRM)
        Route::get('/customer/email-marketing', [CustomerController::class, 'emailMarketing'])->name('email-marketing');
        Route::get('/customer/email-marketing/message-template', [CustomerController::class, 'messageTemplate'])->name('message-template');
        Route::get('/customer/email-marketing/message-list', [CustomerController::class, 'messageList'])->name('message-list');
        Route::get('/customer/email-marketing/compose-email', [CustomerController::class, 'composeEmail'])->name('compose-email');
        Route::get('/customer/email-marketing/compose-mobile', [CustomerController::class, 'composeMobile'])->name('compose-mobile');

        Route::get('/customer/corporate', [CustomerController::class, 'corporate'])->name('corporate');
        Route::get('/customer/sale-tracking', [CustomerController::class, 'salesTracking'])->name('sales-tracking');
        Route::resource('customer', CustomerController::class);

        // routes for corporate (CRM)
        Route::get('/customer/corporate/agent',[CorporateController::class,'Agent'])->name('agent');
        Route::get('/customer/corporate/commission',[CorporateController::class,'Commission'])->name('commission');

        Route::get('/requisition/pending-list', [RequisitionController::class, 'pendingList'])->name('pending-list');
        Route::get('/requisition/pending-list/{requisition_id}', [RequisitionController::class, 'viewPendingRequest'])->name('view-pending-request');
        Route::resource('requisition', RequisitionController::class);

    });

    //route for login
    Route::get('dashboard', [UserController::class, 'viewDashboard'])->middleware(['auth', 'verified'])->name('dashboard');
    Route::get('/notes', [NoteController::class, 'index']);

    Route::get('/send-message', function () {
        broadcast(new MessageSent('Hello from Reverb + Livewire!'));
        return 'Message Sent!';
    });

    // Notes
    Route::get('/calendar', [CalendarController::class, 'index'])->name('calendar');
    Route::post('/calendar/save-note', [CalendarController::class, 'saveNote'])->name('calendar.save-note');
    Route::delete('/calendar/delete-note', [CalendarController::class, 'deleteNote'])->name('calendar.delete-note');
    Route::get('/calendar/notes', [CalendarController::class, 'getNotes'])->name('calendar.notes');

    

require __DIR__.'/auth.php';