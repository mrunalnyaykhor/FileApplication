<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VerificationController;
Route::get('/send-test-email', [HomeController::class, 'sendTestEmail']);

Route::get('/forget-password',[RegistrationController::class,'forgetPasswordLoad']);
Route::post('/forget-password',[RegistrationController::class,'forgetPassword'])->name('forgetPassword');

Route::get('/reset-password',[RegistrationController::class,'resetPasswordLoad']);
Route::post('/reset-password',[RegistrationController::class,'resetPassword'])->name('resetPassword');



Route::get('/', function () {  return view('auth.login');});
Route::get('gallery',[App\Http\Controllers\GalleryController::class,'index']);
Route::get('gallery/upload',[App\Http\Controllers\GalleryController::class,'create']);
Route::post('gallery/upload',[App\Http\Controllers\GalleryController::class,'store']);
Route::get('gallery', [App\Http\Controllers\GalleryController::class, 'index'])->name('gallery.index');
Route::delete('/gallery/{id}', [App\Http\Controllers\GalleryController::class, 'delete'])->name('gallery.delete');

Route::get('homepage',[App\Http\Controllers\GalleryController::class,'index']);

Route::get('register', function () { return view('auth.register');});
Route::get('about', function () { return view('auth.about');});
Route::get('contact', function () { return view('auth.contact');});
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::post('/user/{id}/update-name', [RegistrationController::class, 'updateName'])->name('edit.updateName');
Route::get('/edit', [RegistrationController::class, 'editProfile'])->name('edit');

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
