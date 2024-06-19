<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;

Route::get("/register", [RegistrationController::class, "index"]);
Route::post("/register", [RegistrationController::class, "register"]);
