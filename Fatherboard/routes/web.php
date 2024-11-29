<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SettingController;
use App\Models\CustomerInfo;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;

Route::get('/login', [AuthController::class, "giveLogin"]);
Route::get('/', function()
{
    return view('welcome');
});


Route::post('/_login', [AuthController::class, 'form_login']);

Route::post('/_register', [AuthController::class, "form_register"]);



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
Route::get('/product/{id}', action: [ProductController::class, "show"]);
Route::post('/get/products', function()
{
    $data = Product::all();
    return view("products", ["data"=>$data] );
});


Route::get('/settings', [SettingController::class, 'pageSettings']);


Route::post("/create/product", [ProductController::class, 'create']);

Route::post("/edit/product", [ProductController::class, 'edit']);

Route::post("/update/product", [ProductController::class, 'update']);

Route::post("/delete/product", [ProductController::class, 'destroy']);