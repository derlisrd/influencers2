<?php

use Illuminate\Support\Facades\Route;



Route::view('/login','Auth.login')->name('login')->middleware("guest");

Route::view('/register','Auth.login')->name('register')->middleware("guest");


Route::middleware(['auth'])->group(function () {

    Route::get("/")->name("home");

});
