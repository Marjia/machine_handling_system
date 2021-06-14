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
use App\Http\Controllers\InvoicePDFController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ShowSessionController;
use App\Http\Controllers\UserInvoiceController;
use App\Http\Controllers\ShowTaggedMachine;
use App\Http\Controllers\EditSessionRate;

use Illuminate\Support\Facades\Route;


Route::view('/','template.home')->name('home');

// Route::get('admin/dashboard',[HomeController::class, 'adminHome'])
//       ->name('admin-home')
//       ->middleware('is_admin');
//Route::view('/dashboard','admin.dashboard')->name('dashboard');


//dashboard route
Route::group(['middleware' => ['auth']], function() {
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
});

//admin machine routes

Route::resource('machine',MachinePostContoller::class)->except(['destroy']);
Route::get('machine/{id}/delete',[MachineDeactivationController::class, 'edit'])->name('machine-delete');

// admin tag machine routes

Route::get('/assign-machine',[AssignMachineController::class,'create'])->name('assign-machine');
Route::post('/assign-machine', [AssignMachineController::class,'store']);
Route::get('/tagged-machine', [DetagMachineController::class,'create'])->name('detag-machine');
Route::get(
    '/detag-machine/{id}/detag', [DetagMachineController::class, 'edit']
    )->name('delete-detag');
//Route::resource('edit-session-rate',EditTaggedSessionRate::class)->only('edit','update');

Route::resource('user', UserPostsController::class)->except(['destroy']);
Route::get('user/{id}/delete',[UserDeactivationController::class, 'edit'])->name('user-delete');

//admin invoice routes

Route::resource('invoice',IsInvoiceController::class)->only(['index','store','edit','update','show','create']);
Route::resource('date-invoice',DatePickerInvoice::class)->only(['store']);
Route::get('/pdf/{id}', [InvoicePDFController::class, 'createPDF'])->name('create-pdf');
// Route::view('/cards','admin.invoices.cards')->name('cards-payment');
// Route::view('/mobile-banking','admin.invoices.mobileBanking')->name('mobile-banking-payment');
// Route::view('/net-banking','admin.invoices.netBanking')->name('net-banking-payment');

//admin session routes

Route::resource('user-session',UserSessionController::class)->only(['index','edit','update','store']);

//Admin Edit session rate route

Route::resource('edit-rate',EditSessionRate::class)->only(['index','edit','update']);

//show profile route
Route::get('/profile',[ProfileController::class,'profileController'])->name('profile');

//user session Controller
Route::resource('show-session',ShowSessionController::class)->only(['index']);

//user tagged maachine
Route::resource('show-tagged-machine',ShowTaggedMachine::class)->only(['index']);

//user invoice controller
Route::resource('user-invoice',UserInvoiceController::class)->only(['index','store','edit','update','show','create']);
