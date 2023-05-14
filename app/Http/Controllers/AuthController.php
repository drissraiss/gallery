<?php

namespace App\Http\Controllers;

use App\Rules\ValidUsername;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;

use function PHPUnit\Framework\isNull;

class AuthController extends Controller
{

    public function login()
    {
        $cur_lang =  App::getLocale();
        $dir = App::getLocale() == "ar" ? "rtl" : "ltr";
        return view('auth.login', compact("cur_lang", "dir"));
    }
    public function signup()
    {
        $cur_lang =  App::getLocale();
        $dir = App::getLocale() == "ar" ? "rtl" : "ltr";
        return view('auth.signup', compact("cur_lang", "dir"));
    }
    public function try_create_account(Request $request)
    {
        $request->validate([
            "username" => ["required", "min:4", "max:20", new ValidUsername()],
            "email" => ["required", "email", "unique:users"],
            "password" => ["required", "min:8", "confirmed"],
            "password_confirmation" => "required",
            "conditions" => "required"
        ]);
        $data = [
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'created_at' => now()
        ];

        self::create_account($data);
        return redirect()->route("login")->with("create_acc_success", 1);
    }
    public function create_account($data)
    {
        DB::table('users')->insert($data);
    }
    public function try_login(Request $request)
    {   
        $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);
        $account = DB::table('users')->where('email', $request->email)->first();
        if(is_null($account) or !Hash::check($request->password, $account->password)){
            return redirect()->route('login')->withErrors([
                "account_not_exists" => __('validation.account_not_exists')
            ])->withInput();
        }
        
        session()->put("connected", 1);
        return redirect()->route('home');
    }
    public function logout()
    {
        session()->forget("connected");
        return redirect()->route("login");
    }
}
