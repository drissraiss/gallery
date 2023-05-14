<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cookie;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OthersController;



Route::get('/login', [AuthController::class, "login_form"])->name("login");
Route::get('/signup', [AuthController::class, "signup_form"])->name("signup");

Route::post('/try_signup', [AuthController::class, "try_signup"])->name("try_signup");




Route::view("termsAndConditions", "termsAndConditions.termsAndConditions");

Route::get('/change_lang/{lang}', [OthersController::class, "change_lang"])->name("change_lang");

Route::get('/', function () {
    $dir = App::getLocale() == "ar" ? "rtl" : "ltr";
    $username = session('username');
    return view('home', compact("dir", 'username'));
})->name('home');

Route::post('/try_login', [AuthController::class, "try_login"])->name('try_login');
Route::get('/logout', [AuthController::class, "logout"])->name('logout');

Route::get('test', function () {
    $session = session('_token');
    $cookie = Cookie::get('laravel_session');
    dd($cookie);
});
Route::view('settings', 'settings');
Route::get('settings', function () {
    $dir = App::getLocale() == "ar" ? "rtl" : "ltr";
    $username = session('username');
    return view('settings', compact('dir', 'username'));
});
