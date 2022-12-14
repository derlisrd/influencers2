<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Cron\ReportsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\DomainController;
use App\Http\Controllers\JoinController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SocialNetworkController;
use Illuminate\Support\Facades\Route;



Route::view('/login','Auth.login')->name('login')->middleware("guest");
Route::post('/login',[LoginController::class,'login'])->name('login_post')->middleware("guest");

Route::view('/register','Auth.register')->name('register')->middleware("guest");
Route::post('/register',[RegisterController::class,'register'])->name('register_post')->middleware("guest");
Route::get('/register/step2',[RegisterController::class,'register_step2'])->name('register_step2')->middleware("guest");
Route::post('/register/step2',[RegisterController::class,'register_step2_post'])->name('register_step2_post')->middleware("guest");

Route::middleware(['auth'])->group(function () {

    Route::get('/',[DashboardController::class,'index'])->name('home');

    Route::get('/profile',[AccountController::class,'profile'])->name('profile');
    Route::post('/profile',[AccountController::class,'profile_post'])->name('profile_post');
    Route::get('/profile/password',[AccountController::class,'profile_password'])->name('profile_password');
    Route::post('/profile/password_post',[AccountController::class,'profile_password_post'])->name('profile_password_post');

    Route::get('/socialnetworks',[SocialNetworkController::class,'socialnetworks'])->name('socialnetworks');
    Route::get('/socialnetworks/create',[SocialNetworkController::class,'socialnetworks_create'])->name('socialnetworks_create');
    Route::post('/socialnetworks/store',[SocialNetworkController::class,'socialnetworks_store'])->name('socialnetworks_store');
    Route::get('/socialnetworks/{id}',[SocialNetworkController::class,'socialnetworks_edit'])->name('socialnetworks_edit');
    Route::post('/socialnetworks/update',[SocialNetworkController::class,'socialnetworks_update'])->name('socialnetworks_update');

    Route::get('/setting',[SettingController::class,'setting'])->name('setting');
    Route::post('/setting_store',[SettingController::class,'setting_store'])->name('setting_store');

    Route::get('/domains',[DomainController::class,'index'])->name('domains');
    Route::post('/domain_store',[DomainController::class,'store'])->name('domain_store');

    Route::get('/materias',[MateriaController::class,'index'])->name('materias');
    Route::post('/materia_store',[MateriaController::class,'store'])->name('materia_store');
    Route::get('/materias/{id}',[MateriaController::class,'edit'])->name('materia_edit');
    Route::post('/materia_update',[MateriaController::class,'update'])->name('materia_update');
    Route::get('/materia_destroy/{id}',[MateriaController::class,'destroy'])->name('materia_destroy');
    Route::get('/materia/approve/{id}',[MateriaController::class,'approve'])->name('materia_approve');

    Route::get('/posts',[PostController::class,'index'])->name('posts');

    Route::get('/payments',[PaymentController::class,'index'])->name('payments');
    Route::get('/payment/request',[PaymentController::class,'payment_request'])->name('payment_request');
    Route::post('/payment/request',[PaymentController::class,'payment_request_post'])->name('payment_request_post');

    Route::get('/users',[UserController::class,'index'])->name('users');
    Route::get('/user/active/{id}',[UserController::class,'user_active'])->name('user_active');
    Route::get('/user/desactive/{id}',[UserController::class,'user_desactive'])->name('user_desactive');

    Route::get("/logout",[LoginController::class,'logout'])->name("logout");


    Route::get("/raveshare/join",[JoinController::class,'index'])->name('raveshare_join');
    Route::post("/raveshare/join",[JoinController::class,'store'])->name('raveshare_join_store');
});

//Route::get('/reports',[ReportsController::class,'getReports']);
