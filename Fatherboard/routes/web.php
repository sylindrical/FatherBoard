<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\SettingController;
use App\Models\CustomerInfo;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Models\Review;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\RequirementController;


Route::get('/login', [AuthController::class, 'giveLogin']);
Route::get('/',function(){
    return view('welcome');
});

Route::post('/review',[ReviewController::class,'store'])->name('submitReview');

Route::post('/_login', [AuthController::class, 'form_login']);

Route::post('/_register', [AuthController::class, "form_register"]);

Route::get('/review', [ReviewController::class, 'create'])->name('createReview');

Route::get('/product/{id}/review', [ReviewController::class,'showReview'])
->name('review.show');

Route::get("/register",[AuthController::class,"giveRegister"])->name("register");

Route::get('logout', [AuthController::class, "logOut"]);
Route::get('/home', function() {

    $loggedIn = AuthController::loggedIn();
    if ($loggedIn)
    {
        
    return view("home", ["data"=>Product::all()]);
    }
    else{
        return view('login');

    }
});

Route::post('/get/products', function()
{
    $data = Product::all();
    return view("products", ["data"=>$data] );
});



Route::get('/settings', [SettingController::class, 'pageSettings']);

Route::post('/basket/add',[BasketController::class,'add'])->name('basket.add');
Route::post('/basket/remove',[BasketController::class,'remove'])->name('basket.index');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout',[CheckoutController::class, 'process'])->name('checkout.process');
Route::get('/checkout/sucess', [CheckoutController::class,'success'])->name('checkout_success');

Route::post("/create/product", [ProductController::class, 'create']);

Route::post("/edit/product", [ProductController::class, 'edit']);

Route::post("/update/product", [ProductController::class, 'update']);

Route::post("/delete/product", [ProductController::class, 'destroy']);

Route::get('/filter-products', [RequirementController::class, 'filterProducts']);