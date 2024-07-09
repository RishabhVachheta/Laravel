<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CFPGPaymentController;

Route::get('cashfree/payments/create', [CFPGPaymentController::class, 'create'])->name('callback');
Route::post('cashfree/payments/store', [CFPGPaymentController::class, 'store'])->name('store');
Route::any('cashfree/payments/success', [CFPGPaymentController::class, 'success'])->name('success');
