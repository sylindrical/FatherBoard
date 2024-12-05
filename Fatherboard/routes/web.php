<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SettingController;
use App\Models\CustomerInfo;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Models\Review;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\BasketController;


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

Route::get('/basket',[BasketController::class,'index'])->name('basketIndex');
Route::post('/basket/add',[BasketController::class,'add'])->name('basketAdd');
Route::post('/basket/remove',[BasketController::class,'remove'])->name('basketRemove');
Route::post('/basket/update',[BasketController::class,'update'])->name('basketUpdate');
Route::get('/basket/checkout',[BasketController::class,'checkout'])->name('basketCheckout');
