<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\adminController;




Route::post('dashboard/login',[adminController::class,'login'])->name('login');



Route::group(['middleware'=>"web"],function(){
Route::get('admin/dashboard',[adminController::class,'viewdashboard'])->name('dashboard');
Route::get('/',[adminController::class,'showlogin'])->name('showlogin');
});

Route::get('logout',[adminController::class,'logout'])->name('logout');
