<?php

use App\Http\Controllers\AssignMachineController;
use App\Http\Controllers\DetagMachineController;
use App\Http\Controllers\GenerateInvoiceController;
use App\Http\Controllers\GenerateInvoicePdfController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IsInvoiceController;
use App\Http\Controllers\MachineDeactivationController;
use App\Http\Controllers\MachinePostContoller;
use App\Http\Controllers\UserDeactivationController;
use App\Http\Controllers\UserPostsController;
use App\Http\Controllers\UserSessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DatePickerInvoice;
use Illuminate\Support\Facades\Route;


Route::view('/','template.home')->name('home');

Route::get('admin/dashboard',[HomeController::class, 'adminHome'])
      ->name('admin-home')
      ->middleware('is_admin');
Route::view('/dashboard','admin.dashboard')->name('adminDashboard');

Route::resource('machine',MachinePostContoller::class)->except(['destroy']);
Route::get('machine/{id}/delete',[MachineDeactivationController::class, 'edit'])->name('machine-delete');

Route::get('/assign-machine',[AssignMachineController::class,'create'])->name('assign-machine');
Route::post('/assign-machine', [AssignMachineController::class,'store']);
Route::get('/tagged-machine', [DetagMachineController::class,'create'])->name('detag-machine');
Route::get(
    '/detag-machine/{id}/detag', [DetagMachineController::class, 'edit']
    )->name('delete-detag');

Route::resource('user', UserPostsController::class)->except(['destroy']);
Route::get('user/{id}/delete',[UserDeactivationController::class, 'edit'])->name('user-delete');

Route::resource('invoice',IsInvoiceController::class)->only(['index','store','edit','update','show','create']);
Route::resource('date-invoice',DatePickerInvoice::class)->only(['store']);
Route::get('generate-invoice/{id}',[GenerateInvoicePdfController::class,'invoices'])->name('generate-invoices');

Route::resource('user-session',UserSessionController::class)->only(['index','edit','update']);

Route::get('/profile',[ProfileController::class,'profileController'])->name('profile');
