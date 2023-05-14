<?php

namespace App\Http\Controllers;

use App\Rules\ValidUsername;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;

use function PHPUnit\Framework\isNull;

class AuthController extends Controller
{

    public function login_form()
    {
        $cur_lang =  App::getLocale();
        $dir = App::getLocale() == "ar" ? "rtl" : "ltr";

        // check if cokie_login exists and get info
        $cookie_login_data = json_decode(Cookie::get('cookie_login')) ?? new class
        {
            public $email = '';
            public $password = '';
        };
        return view('auth.login', compact('cur_lang', 'dir', 'cookie_login_data'));
    }
    public function signup_form()
    {
        $cur_lang =  App::getLocale();
        $dir = App::getLocale() == "ar" ? "rtl" : "ltr";
        return view('auth.signup', compact("cur_lang", "dir"));
    }
    public function try_signup(Request $request)
    {
        $request->validate([
            "username" => ["required", "min:4", "max:20", new ValidUsername()],
            "email" => ["required", "email", "unique:users"],
            "password" => ["required", "min:8", "confirmed"],
            "password_confirmation" => "required",
            "conditions" => "required"
        ]);
        $data = [
            'username' => strtolower($request->input('username')),
            'email' => strtolower($request->input('email')),
            'password' => Hash::make($request->input('password')),
            'created_at' => now()
        ];

        self::signup($data);
        return redirect()->route("login")->with("create_acc_success", 1);
    }
    private function signup($data)
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
        if (is_null($account) or !Hash::check($request->password, $account->password)) {
            return redirect()->route('login')->withErrors([
                "account_not_exists" => __('validation.account_not_exists')
            ])->withInput();
        }
        // for save email and password in cookie
        if ($request->has('remember_me')) {
            $data_json = json_encode(['email' => $request->email, 'password' => $request->password]);
            $cookie_login = Cookie::make('cookie_login', $data_json/*, path: '/login'*/);
            Cookie::queue($cookie_login);
        }
        return self::login($account);
    }
    private function login($account)
    {
        session()->put(['connected' => 1, 'id' => $account->id, 'username' => $account->username]);
        return redirect()->route('home');
    }
    public function logout()
    {
        session()->flush();
        return redirect()->route("login");
    }
}
