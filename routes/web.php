<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\WakalaController;
use App\Http\Controllers\TransactionController;

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
    Route::any('/dashboard',[WakalaController::class,'index'] )->name('dashboard');
    Route::any('/sale_bando',[TransactionController::class,'make_sales'])->name('sale_bando');;
    Route::any('/local_customer_verify',[TransactionController::class,'verify_customer'])->name('local_customer_verify');

});

require __DIR__.'/auth.php';
