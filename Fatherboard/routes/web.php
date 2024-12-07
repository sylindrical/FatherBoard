<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SettingController;
use App\Models\CustomerInfo;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\BasketController;

Route::get('/login', [AuthController::class, 'giveLogin']);
Route::get('/',function(){

    return view('welcome');
});
//review side back-end
Route::post('/review',[ReviewController::class,'store'])->name('submitReview');
Route::get('/review', [ReviewController::class, 'create'])->name('createReview');
Route::get('/product/{id}/review', [ReviewController::class,'showReview'])->name('review.show');

Route::post('/_login', [AuthController::class, 'form_login']);
Route::post('/_explicit_login', [AuthController::class, "explicit_login"]);
Route::post("/_explicit_register", [AuthController::class, "explicit_register"]);
Route::post('/_register', [AuthController::class, "form_register"]);
Route::get("/register",[AuthController::class,"giveRegister"])->name("register");

Route::get('logout', [AuthController::class, "logOut"]);
Route::get('/home', [HomeController::class, "giveHome"]);



// Handles products
Route::get('/product/{id}', action: [ProductController::class, "show"]);
Route::get('/products', [ProductController::class, "index"]);
Route::post('/products', [ProductController::class, "indexSpecific"]);

Route::post("/create/product", function ()
{

});



// Settings-related

Route::get('/settings', [SettingController::class, 'pageSettings']);

// Handles address
Route::post('/get/address', [SettingController::class, "showAddress"]);
Route::post('/add/address', [SettingController::class, "form_addAddress"]);
Route::post("/delete/address", [SettingController::class, "form_removeAddress"]);




Route::post('/get/personal', [SettingController::class, "showPersonal"]);

//basket side back-end
Route::get('/basket',[BasketController::class,'index'])->name('basketIndex');
Route::post('/basket/add',[BasketController::class,'add'])->name('basketAdd');
Route::post('/basket/remove',[BasketController::class,'remove'])->name('basketRemove');
Route::post('/basket/update',[BasketController::class,'update'])->name('basketUpdate');
Route::get('/basket/checkout',[BasketController::class,'checkout'])->name('basketCheckout');

