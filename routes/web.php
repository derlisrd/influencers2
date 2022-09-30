<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Route;



Route::view('/login','Auth.login')->name('login')->middleware("guest");
Route::post('/login',[LoginController::class,'login'])->name('login_post')->middleware("guest");

Route::view('/register','Auth.register')->name('register')->middleware("guest");
Route::post('/register',[RegisterController::class,'register'])->name('register_post');

Route::middleware(['auth'])->group(function () {

    Route::get("/",[DashboardController::class,'index'])->name("home");

    Route::get('/profile',[AccountController::class,'profile'])->name('profile');
    Route::post('/profile',[AccountController::class,'profile_post'])->name('profile_post');
    Route::get('/socialnetworks',[AccountController::class,'socialnetworks'])->name('socialnetworks');
    Route::get('/socialnetworks/create',[AccountController::class,'socialnetworks_create'])->name('socialnetworks_create');
    Route::post('/socialnetworks/store',[AccountController::class,'socialnetworks_store'])->name('socialnetworks_store');
    Route::get('/socialnetworks/{id}',[AccountController::class,'socialnetworks_edit'])->name('socialnetworks_edit');
    Route::post('/socialnetworks/update',[AccountController::class,'socialnetworks_update'])->name('socialnetworks_update');

    Route::get('/setting',[SettingController::class,'setting'])->name('setting');
    Route::post('/setting_store',[SettingController::class,'setting_store'])->name('setting_store');

    Route::get("/logout",[LoginController::class,'logout'])->name("logout");
});
