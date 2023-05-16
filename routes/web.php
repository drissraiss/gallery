<?php

use Illuminate\Support\Str;
use App\Models\CategoryUser;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cookie;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OthersController;
use App\Http\Controllers\PictureController;
use App\Http\Controllers\CategoryController;

Route::get('/login', [AuthController::class, "login_form"])->name("login");
Route::get('/signup', [AuthController::class, "signup_form"])->name("signup");

Route::post('/try_signup', [AuthController::class, "try_signup"])->name("try_signup");




Route::view("termsAndConditions", "termsAndConditions.termsAndConditions");

Route::get('/change_lang/{lang}', [OthersController::class, "change_lang"])->name("change_lang");

Route::get('/', [PictureController::class, 'create'])->name('home');

Route::post('/try_login', [AuthController::class, "try_login"])->name('try_login');
Route::get('/logout', [AuthController::class, "logout"])->name('logout');



Route::get('settings', function () {
    $dir = App::getLocale() == "ar" ? "rtl" : "ltr";
    $cur_lang = App::getLocale();
    $username = session('username');
    $categories = CategoryUser::all()->where('user_id', session('id'));
    $categories_with_count = (new CategoryUser())->get_categories_with_count();
    return view('settings', compact('dir', 'username', 'categories', 'cur_lang', 'categories_with_count'));
})->name('settings');


Route::post('add_category', [CategoryController::class, 'add'])->name('add_category');
Route::put('update_category', [CategoryController::class, 'update'])->name('update_category');
Route::delete('delete_category', [CategoryController::class, 'delete'])->name('delete_category');

Route::post('add_picture', [PictureController::class, 'store'])->name('add_picture');
Route::post('add_picture_shortcut', [PictureController::class, 'store_shortcut'])->name('add_picture_shortcut');

Route::put('update_password', [AuthController::class, 'update_password'])->name('update_password');

Route::get('category/{category}', [CategoryController::class, 'show_category'])->name('category');





Route::get('test', function () {
    $obj_model = new CategoryUser();
    $result = $obj_model->get_categories_with_count();
    return (new CategoryUser())->get_categories_with_count();
    //return $curr_password;
});
