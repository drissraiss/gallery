<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OthersController;
use App\Http\Controllers\PictureController;
use App\Http\Controllers\CategoryController;


Route::get('/', [PictureController::class, 'create'])->name('home');

Route::post('/try_login', [AuthController::class, "try_login"])->name('try_login');
Route::post('/try_signup', [AuthController::class, "try_signup"])->name("try_signup");
Route::get('/login', [AuthController::class, "login_form"])->name("login");
Route::get('/signup', [AuthController::class, "signup_form"])->name("signup");
Route::get('/logout', [AuthController::class, "logout"])->name('logout');
Route::delete('/drop_account_user', [AuthController::class, "drop_account_user"])->name('drop_account_user');

Route::view("termsAndConditions", "termsAndConditions.termsAndConditions")->name('termsAndConditions');
Route::get('/change_lang/{lang}', [OthersController::class, "change_lang"])->name("change_lang");

Route::post('add_category', [CategoryController::class, 'add'])->name('add_category');
Route::put('update_category', [CategoryController::class, 'update'])->name('update_category');
Route::delete('delete_category', [CategoryController::class, 'delete'])->name('delete_category');

Route::get('category/{category}', [CategoryController::class, 'show_category'])->name('category');
Route::redirect('category', '/');

Route::post('add_picture', [PictureController::class, 'store'])->name('add_picture');
Route::post('add_picture_shortcut', [PictureController::class, 'store_shortcut'])->name('add_picture_shortcut');
Route::put('update_picture_name', [PictureController::class, 'update'])->name('update_picture_name');
Route::delete('delete_picture/{category_id}/{picture_id}', [PictureController::class, 'destroy'])->name('delete_picture');

Route::get('settings', [AuthController::class, 'settings'])->name('settings');
Route::put('update_password', [AuthController::class, 'update_password'])->name('update_password');
