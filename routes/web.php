<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\Formcontroller;
use App\Http\Controllers\UserFormControllerr;
use App\Http\Controllers\GalleryController;

Route::get('/forget-password',[RegistrationController::class,'forgetPasswordLoad']);
Route::post('/forget-password',[RegistrationController::class,'forgetPassword'])->name('forgetPassword');

Route::get('/reset-password',[RegistrationController::class,'resetPasswordLoad']);
Route::post('/reset-password',[RegistrationController::class,'resetPassword'])->name('resetPassword');



Route::get('/', function ()
 {  return view('auth.login');
});
Route::get('gallery',[GalleryController::class,'index']);
Route::get('gallery/upload',[GalleryController::class,'create']);
Route::post('gallery/upload',[GalleryController::class,'store']);
Route::get('gallery', [GalleryController::class, 'index'])->name('gallery.index');

Route::delete('/gallery/{id}', [GalleryController::class, 'delete'])->name('gallery.delete');

Route::get('homepage',[GalleryController::class,'index']);

Route::get('/employee',function(){
    return view('auth.employee');
});
Route::post('employee-register',[EmployeeController::class,'store'])->name('employeeCreate.store');

Route::get('about', function () { return view('auth.about');});
Route::get('contact', function () { return view('auth.contact');});
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::post('/user/{id}/update-name', [RegistrationController::class, 'updateName'])->name('edit.updateName');
Route::get('/edit', [RegistrationController::class, 'editProfile'])->name('edit');

Route::post('/register', [RegistrationController::class, 'store'])->name('register.store');
Route::get("/register", [RegistrationController::class,'index'])->name("register");
Route::get('/verify', [VerificationController::class, 'verifyEmail'])->name('verify.email');


Route::get('/login',[LoginController::class,'index',])->name('login');
Route::post('/login',[LoginController::class,'login',])->name("login.post");
Route::post('/logout',[LoginController::class,'logout']);


Route::get("send",[RegistrationController::class,"sendnotification"]);

Route::get('dashboard/', [FileController::class, 'index'])->name('dashboard.index');
Route::post('dashboard/create', [FileController::class, 'create'])->name('uploads.create');
Route::post('dashboard/store', [FileController::class, 'store'])->name('dashboard.store');

//

Route::get('/get',function(){
    return 'Hello ..How are you?';
});

Route::get('index',[Controller::class,'index']);
Route::get('/greeting', function () {
    return 'Hello World';
});
Route::get('/first/{fname}/second/{sname}',function($fname,$sname){
    return "name :".$fname." ".$sname;
});

Route::get('/animal',[AnimalController::class,'index'])->name('animal.index');

Route::post('/animal',[AnimalController::class,'store'])->name('animal.store');





Route::get('getdata' ,[FormController::class,'index']);
Route::post('processData' ,[UserFormControllerr::class,'formData']);
Route::get('userdata',[UserFormControllerr::class,'userformprocess']);
Route::post('userprocess',[UserFormControllerr::class,'processData']);
Route::fallback(function(){
    echo "this url does not exist";
});

