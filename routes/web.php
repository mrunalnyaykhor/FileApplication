<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VerificationController;

Route::get('/send-test-email', [HomeController::class, 'sendTestEmail']);

Route::get('/', function () {
    return view('welcome');
});
Route::get('gallery',[App\Http\Controllers\GalleryController::class,'index']);
Route::get('gallery/upload',[App\Http\Controllers\GalleryController::class,'create']);
Route::post('gallery/upload',[App\Http\Controllers\GalleryController::class,'store']);
//Route::get('/gallery/upload', [App\Http\Controllers\GalleryController::class, 'index'])->name('gallery.index');


Route::get('home',[App\Http\Controllers\GalleryController::class,'index']);


// Route::middleware("auth")->group(function(){
//    Route::get('/home', function () {
//     // return view('auth.dashboard');
//     return view('gallery.index');
// })->name('home');
// });

Route::get('register', function () {
    return view('auth.register');
});
Route::get('about', function () {
    return view('auth.about');
});
Route::get('contact', function () {
    return view('auth.contact');
});

Route::post('/register', [RegistrationController::class, 'store'])->name('register.store');
Route::get("/register", [RegistrationController::class,'index'])->name("register");
Route::get('/verify', [VerificationController::class, 'verifyEmail'])->name('verify.email');

Route::get('login',[LoginController::class,'index'])->name('login');
Route::post('/login',[LoginController::class,'login'])->name("login.post");

Route::get("send",[RegistrationController::class,"sendnotification"]);

Route::get('dashboard/', [FileController::class, 'index'])->name('dashboard.index');
Route::post('dashboard/create', [FileController::class, 'create'])->name('uploads.create');
Route::post('dashboard/store', [FileController::class, 'store'])->name('dashboard.store');

//
