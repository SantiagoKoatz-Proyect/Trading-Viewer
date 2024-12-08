<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;


Route::middleware("guest")->group(function () {
    Route::get('/login', [AccountController::class, "login"])->name('login');
    Route::get('/registrationForm', [AccountController::class, "showRegistrationForm"])->name('showRegistrationForm');
    Route::put('/newAccount', [AccountController::class, "newAccount"])->name('newAccount');
    Route::post('/validateAccount', [AuthController::class, "validateAccount"])->name('validateAccount');
});


Route::middleware("auth")->group(function () {
    Route::get('/myAccount/{id}', [AccountController::class, "details"])->name('myAccount');
    Route::get('/myAccount/{id}/delete', [AccountController::class, "delete"])->name('deleteAccount');
    Route::put('/myAccount/{id}/update', [AccountController::class, "update"])->name('updateAccount');

    Route::get('/logout', [AuthController::class, "logout"])->name('logout');
});
