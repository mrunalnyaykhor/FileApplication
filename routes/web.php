<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware("auth")->group(function(){
   // Route::get("/","welcome")->name("home");

   Route::get('/home', function () {
    return view('welcome');
})->name('home');
});

Route::get('register', function () {
    return view('auth.register');
});

Route::post('/register', [RegistrationController::class, 'store'])->name('register.store');

//Route::post('/register', 'RegistrationController@store')->name('register.store');
//Route::get('register', 'App\Http\Controllers\Api\RegistrationController@register');

Route::get("/register", [RegistrationController::class,'index'])->name("register");

Route::get('registers', function () {
    return view('auth.login');
});

Route::get('login',[LoginController::class,'index'])->name('login');
Route::post('/login',[LoginController::class,'login'])->name("login.post");

Route::get("send",[RegistrationController::class,"sendnotification"]);


//
