<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('company', CompanyController::class);
Route::resource('employee', EmployeeController::class);



Route::group(['prefix' => 'account'], function(){

    Route::group(['middleware' => 'guest'], function(){
        Route::get('login', [LoginController::class,'index'])->name('account.login');
        Route::get('register', [LoginController::class,'register'])->name('account.register');
        Route::post('process-register', [LoginController::class,'processRegister'])->name('account.processRegister');
        Route::post('authenticate', [LoginController::class,'authenticate'])->name('account.authenticate');

    });

    Route::group(['middleware' => 'auth'], function(){
        Route::get('logout', [LoginController::class,'logout'])->name('account.logout');
        Route::get('dashboard', [DashboardController::class,'index'])->name('account.dashboard');
        
    });
});






