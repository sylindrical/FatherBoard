<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SettingController;
use App\Models\CustomerInfo;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;


Route::get('/login', [AuthController::class, 'giveLogin']);
Route::get('/',function(){

    return view('welcome');
});

Route::post('/submit-review',[ReviewController::class,'store'])->name('submitReview');
Route::post('/_login', [AuthController::class, 'form_login']);

Route::post('/_register', [AuthController::class, "form_register"]);

Route::get('/review', function () {
    return view('review');
});
Route::get('/product/{id}/review', [ReviewController::class,'showReview'])->name('reviewForm')->middleware('auth');
Route::get("/register",[AuthController::class,"giveRegister"])->name("register");

Route::get('logout', [AuthController::class, "logOut"]);
Route::get('/home', [HomeController::class, "giveHome"]);
Route::get('/product/{id}', action: [ProductController::class, "show"]);

Route::get('/products', function()
{
    $data = Product::all();
    return view("products", ["data"=>$data] );
});


Route::post('/get/address', [SettingController::class, "showAddress"]);

Route::post('/get/personal', [SettingController::class, "showPersonal"]);


Route::get('/settings', [SettingController::class, 'pageSettings']);



Route::post("/create/product", function ()
{

});

