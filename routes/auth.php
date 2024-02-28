<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.update');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', [EmailVerificationPromptController::class, '__invoke'])
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::any('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
    //---------ADMIN ROUTES-----------------------------
   Route::any('/admin_dashboard',[AdminController::class,'index'])->name('admin_dashboard');
   Route::any('/show_admin',[AdminController::class,'show_admin'])->name('show_admin');
   Route::any('/show_wakala',[AdminController::class,'show_wakala'])->name('show_wakala');
   Route::any('/show_sales',[AdminController::class,'show_sales'])->name('show_sales');
   Route::any('/create_wakala_page',[AdminController::class,'create_wakala'])->name('create_wakala_page');
   Route::any('/create_wakala',[RegisteredUserController::class,'create_wakala'])->name('create_wakala');
   Route::any('/local_customer_list',[AdminController::class,'show_local_customer_list'])->name('local_customer_list');
   Route::any('/local_customer_sync',[AdminController::class,'sync_customer'])->name('local_customer_sync');
  Route::any('/internaldb_customers',[AdminController::class,'show_internaldb_customers'])->name('internaldb_customers');
  Route::any('/admin_show_vifurushi',[AdminController::class,'show_admin_vifurushi'])->name('admin_show_vifurushi');
  Route::any('/show_create_vifurushi',[AdminController::class,'admin_show_create_vifurushi'])->name('show_create_vifurushi');
  Route::any('/create_vifurushi',[AdminController::class,'admin_create_vivfurushi'])->name('create_vifurushi');
  Route::delete('/user/{user}', [AdminController::class, 'destroy'])->name('users.destroy');
  /*  Route::any('/admin_users/edit_admin',[AdminController::class,'edit_admin']);
*/
                
});
