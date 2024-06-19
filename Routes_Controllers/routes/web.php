<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\SingleactionController;
use App\Http\Controllers\PhotoController;

Route::resource('photos', PhotoController::class);

Route::get("/products", [DemoController::class, "index"]);
Route::get("/products/{id}", [DemoController::class, "show"]);
// Route::get("/about", [DemoController::class, "create"]);
Route::get("/about", SingleactionController::class);
// Route::resource("photo", PhotoController::class);


// Route::get("/", function () {
//     return view("home");
// });

// Route::get("/about", function () {
//     return view("about");
// });

// Route::get("/{name?}", function($name = null) {
//     $demo = "<h1>Rajesh</h1>";
//     $data = compact("name","demo");
//     return view("index")->with($data);
// });

// Route::get("/", function () {
//     return view("index");
// });

// Route::get('/', function () {
//     return view('welcome');
// });

//  Route::get('/demo', function(){
//     return view('demo');
//  });

// Route::get('/demo/{name}/{id?}', function ($name, $id=null) {
//     $data = compact('name','id');
//     return view('demo')->with($data);
// });

// Route::post("/main", function () {
//     echo "my name is rajesh";
// });

// Route::put("", function(){
//     echo "";    
// });