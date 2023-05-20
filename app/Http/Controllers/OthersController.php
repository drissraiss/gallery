<?php

namespace App\Http\Controllers;

class OthersController extends Controller
{
    public function change_lang($lang)
    {
        if (in_array($lang, ["en", "fr", "ar"])) {
            session()->put("lang", $lang);
        }
        return redirect()->back();
    }
}
