<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OthersController;

use function PHPUnit\Framework\isNull;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/login', [AuthController::class, "login"])->name("login");
Route::get('/signup', [AuthController::class, "signup"])->name("signup");

Route::post('/try_create_account', [AuthController::class, "try_create_account"])->name("try_create_account");




Route::view("termsAndConditions","termsAndConditions.termsAndConditions");

Route::get('/change_lang/{lang}', [OthersController::class, "change_lang"])->name("change_lang");

Route::get('/', function(){
    return "
    <center>
        <h1>DASHBOARD</h1>
        <a href='logout'>Logout</a>
    </center>";
})->name('home');

Route::post('/try_login', [AuthController::class, "try_login"])->name('try_login');
Route::get('/logout', [AuthController::class, "logout"])->name('logout');

Route::get('test', function(){
    $account = DB::table('users')->where('email', "dridssraiss@gmail.com")->first();
    
    return dd(is_null($account));
});