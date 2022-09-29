<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;



Route::view('/login','Auth.login')->name('login')->middleware("guest");

Route::post('/login',[LoginController::class,'login'])->name('login_post');

Route::view('/register','Auth.login')->name('register')->middleware("guest");


Route::middleware(['auth'])->group(function () {

    Route::get("/",[DashboardController::class,'index'])->name("home");





    Route::get("/logout",[LoginController::class,'logout'])->name("logout");
});
