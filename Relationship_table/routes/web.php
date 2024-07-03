<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
// routes/web.php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

Route::get('/', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart', [CartController::class, 'store'])->name('cart.store');


// Route::get('/', function () {


//     return view('welcome');
// });

Route::resource('student', StudentController::class);
