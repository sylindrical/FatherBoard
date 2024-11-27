<?php

use App\Models\CustomerInfo;
use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return view('login');
});

Route::get('/', function()
{
    return view('welcome');
});
Route::post('/_login', function()
{
    $username = request("username");
    $password = request("password");

    $customer = CustomerInfo::where("Username", $username)->where("Password", $password)->get();
    if ($customer->count() == 0)
    {
        return redirect('login');

    }
    else
    {
        return redirect('home');

    }

    // dd($customer->count()==0);
    
    # CustomerInfo::fi
    
});

Route::post('/_register', function()
{
    $username = request("username");
    $password = request("password");

    $conf = ["Username"=>$username,"Password"=>$password];

    
    CustomerInfo::create($conf);

    return redirect("/login");
});



Route::get('/register', function() {
    return view("register");
});

Route::get('/home', function() {
    return view("home", ["person"=>CustomerInfo::all()]);
});

Route::post('/get/{}', function()
{

});