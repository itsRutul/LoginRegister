<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AccountController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register',[RegistrationController::class, 'index'])->name('register');
Route::post('/register',[RegistrationController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/account', [AccountController::class, 'index'])->name('account');
Route::put('/account', [AccountController::class, 'update'])->name('account.update');
Route::post('/logout', [AccountController::class, 'logout'])->name('logout');
