<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\WakalaController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\VifurushiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');*/

Route::middleware('auth')->group(function () {


    Route::any('/local_customer_signup',[WakalaController::class,'create_local_customer'])->name('local_customer_signup');
    Route::any('/wakala_wateja',[WakalaController::class,'show_customers'])->name('wakala_wateja');
    Route::any('/wakala_mauzo',[WakalaController::class,'show_mauzo'])->name('wakala_mauzo');
   
   
    Route::any('/wakala_vocha',[WakalaController::class,'show_vocha'])->name('wakala_vocha');
    Route::middleware('CheckWakalaPackageWallet')->group(function () {
        Route::any('/sale_bando',[TransactionController::class,'make_sales'])->name('sale_bando');
        Route::any('/dashboard',[WakalaController::class,'index'] )->name('dashboard');
         Route::any('/wakala_vifurushi',[WakalaController::class,'show_vifurushi'])->name('wakala_vifurushi');
    });
    Route::any('/get-kifurushi-price/{kifurushiId}', [VifurushiController::class,'getKifurushiPrice']);
    Route::any('/purchase_kifurushi', [VifurushiController::class,'purchase_kifurushi_process'])->name('purchase_kifurushi');
   // Route::any('/purchased-vocha', [VifurushiController::class,'purchase_vocha_process'])->name('purchased');
    Route::any('/kifurushi-payment-verify', [VifurushiController::class,'verify_payments']);
    Route::any('/user/{user}', [AdminController::class, 'destroy'])->name('users.destroy');

    Route::any('/purchase_vocha', [VifurushiController::class,'purchase_vocha_process'])->name('purchase_vocha');
    Route::any('/purchased-vocha', [VifurushiController::class,'verify_vocha_purchase_payments'])->name('purchased-vocha');
    Route::any('/export-vocha-printout',[VifurushiController::class,'printVocha'])->name('export-vocha-printout');


});

require __DIR__.'/auth.php';
