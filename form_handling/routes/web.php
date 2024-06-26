<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Models\Customer;
use Illuminate\Http\Request;

Route::get("/", function () {
    return view("layouts/main");
});
Route::get("/home", function () {
    return view("Home");
});
Route::get("/about", function () {
    return view("About");
});
Route::get("/register", [RegistrationController::class, "index"]);
Route::post("/register", [RegistrationController::class, "register"]);

Route::get("customer/view", [CustomerController::class, "view"]);
Route::get("customer/create", [CustomerController::class, "create"])->name('customer.create');
Route::get("customer/view/delete/{id}", [CustomerController::class, "delete"])->name('customer.delete');
Route::get("/customer/view/edit/{id}", [CustomerController::class, "edit"])->name('customer.edit');
Route::post("customer/view/update/{id}", [CustomerController::class, "update"])->name('customer.update');

Route::get("/customer", [CustomerController::class, "index"]);
Route::post("/customer", [CustomerController::class, "store"]);

// Route::get("/customer", function () {
//     $customer = Customer::all();
//     echo "<pre>";
//     print_r($customer->toArray());
// });

Route::get('get-all-session', function () {
    $session = session()->all();
    p($session);
});

Route::get('set-session', function (Request $request) {
    $request->session()->put('name', 'WscubeTech');
    $request->session()->put('id', '123');
    session()->flash('status', 'Success');
    return redirect('get-all-session');
});

Route::get('destroy-session', function () {
    session()->forget('name');
    session()->forget('id');
    return redirect('get-all-session');
});
