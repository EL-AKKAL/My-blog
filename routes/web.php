<?php

use App\Http\Controllers\admin\categoryController;
use App\Http\Controllers\admin\homeController as AdminHomeController;
use App\Http\Controllers\admin\postController;
use App\Http\Controllers\admin\tagController;
use App\Http\Controllers\admin\userController;
use App\Http\Controllers\user\homeController;
use Illuminate\Support\Facades\Route;



//---------------------------------- user home
Route::get('/',[homeController::class,'index'])->name('home');

//---------------------------------- user show post
Route::get('post', [homeController::class,'post'])->name('blog');

//---------------------------------- admin home
Route::get('admin', [AdminHomeController::class,'index'])->name('admin');

//---------------------------------- admin category
Route::resource('admin/category',categoryController::class);

//---------------------------------- admin post
Route::resource('admin/post',postController::class);

//---------------------------------- admin tag
Route::resource('admin/tag',tagController::class);

//---------------------------------- admin user
Route::resource('admin/user',userController::class);