<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [AppController::class, 'index'])->name('index');
Route::group(['prefix' => 'accounts'], function () {
    Route::get('/', [AccountController::class, 'index'])->name('accounts.index');
    Route::get('/create', [AccountController::class, 'create'])->name('accounts.create');
    Route::post('/store', [AccountController::class, 'store'])->name('accounts.store');
    Route::get('/edit/{id}', [AccountController::class, 'edit'])->name('accounts.edit');
    Route::post('/update', [AccountController::class, 'update'])->name('accounts.update');
    Route::post('/delete', [AccountController::class, 'delete'])->name('accounts.delete');
});
Route::group(['prefix' => 'transactions'], function () {
    Route::get('/', [TransactionController::class, 'index'])->name('transactions.index');
    Route::get('/create', [TransactionController::class, 'create'])->name('transactions.create');
    Route::post('/store', [TransactionController::class, 'store'])->name('transactions.store');
    Route::post('/delete', [TransactionController::class, 'delete'])->name('transactions.delete');
});