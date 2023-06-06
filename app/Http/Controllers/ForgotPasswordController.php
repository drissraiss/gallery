<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use App\Mail\ForgotPasswordMail;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    public function forgot_password_form()
    {
        $cur_lang =  App::getLocale();
        $dir = App::getLocale() == "ar" ? "rtl" : "ltr";
        return view('auth.forgot_password_form', compact('cur_lang', 'dir'));
    }
    public function change_password()
    {
        $reset_password = request()->reset_password;
        $email = request()->email;
        if (!isset($reset_password) or !isset($email)) {
            return redirect()->back();
        }
        $doesntexist = User::where('email', $email)->where('reset_password', '<>', null)->where('reset_password', $reset_password)->doesntExist();
        if ($doesntexist) {
            return redirect()->back()->with('error', __('forgot_password.emaile_chang_failed'));
        }

        $cur_lang =  App::getLocale();
        $dir = App::getLocale() == "ar" ? "rtl" : "ltr";
        return view('auth.change_password', compact('cur_lang', 'dir', 'reset_password', 'email'));
    }
    public function try_changepassword()
    {
        request()->validate([
            "email" => ["required", "email"],
            "password" => ["required", "min:8", "confirmed"],
        ]);
        $email = request()->email;
        $reset_password = request()->reset_password;
        $user = User::where('email', $email)->where('reset_password', '<>', null)->where('reset_password', $reset_password)->first();
        if (!$user) {
            return redirect()->back()->with('error', __('forgot_password.emaile_chang_failed'));
        }
        $user->password = Hash::make(request()->password);
        $user->reset_password = null;
        $user->save();
        return redirect()->route('login')->with('success', __('forgot_password.emaile_chang_with_success'));
    }
    public function forgot_password()
    {
        $email = request()->email;
        request()->validate([
            'email' => ['required', 'email'],
        ]);
        $doesntExist = User::where('email', $email)->doesntExist();
        if ($doesntExist) {
            return redirect()->back()->withErrors(['email' => __('forgot_password.email_not_exists')])->withInput();
        }
        $user = User::where('email', request()->email)->first();
        $reset_password = Str::random(25);
        $user->reset_password = $reset_password;
        $user->save();
        Mail::to($user->email)->send(new ForgotPasswordMail($user, $reset_password));
        return redirect()->back()->with(['success_emailed' => __('forgot_password.emailed_success')])->withInput();
    }
}
