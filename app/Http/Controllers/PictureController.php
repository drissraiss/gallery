<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\CategoryUser;
use App\Models\PictureUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class PictureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dir = App::getLocale() == "ar" ? "rtl" : "ltr";
        $username = session('username');
        $categories = CategoryUser::all()->where('user_id', session('id'));
        $categories_with_count = (new CategoryUser())->get_categories_with_count(session('id'));
        $category_selected_id = null;
        $category_selected_name = null;
        return view('home', compact("dir", 'username', 'categories', 'categories_with_count', 'category_selected_id', 'category_selected_name'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store_shortcut(Request $request)
    {
        $request->validate([
            'picture_name_shortcut' => ['required', 'max:30'],
            'picture_shortcut' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:5012']
        ]);
        $picture = $request->picture_shortcut;
        $img_name = $request->picture_name_shortcut;
        $category_id = $request->select_categories_home_shortcut;
        $random_str = Str::random(20);
        $img_path_name = date('Y_m_d_h_i_s_', time()) . $random_str . '.' . $picture->extension();
        $picture->move(public_path('storage\users_pictures'), $img_path_name);
        PictureUser::create(['name' => $img_name, 'path' => $img_path_name, 'category_id' => $category_id]);
        return redirect()->back()->withInput()->with('success', __('flash.img_upl_succ'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'picture_name' => ['required', 'max:30'],
            'picture' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:5012']
        ]);
        $picture = $request->picture;
        $img_name = $request->picture_name;
        $category_id = $request->select_categories_home;
        $random_str = Str::random(20);
        $img_path_name = date('Y_m_d_h_i_s_', time()) . $random_str . '.' . $picture->extension();
        $picture->move(public_path('storage\users_pictures'), $img_path_name);
        PictureUser::create(['name' => $img_name, 'path' => $img_path_name, 'category_id' => $category_id]);
        return redirect()->back()->withInput()->with('success', __('flash.img_upl_succ'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        request()->validate([
            'new_name_picture' => ['required', 'max:30']
        ]);
        $category_id = $request->category_id;
        $picture_id = $request->picture_id;
        $name = $request->new_name_picture;
        $reponse = (new PictureUser())->update_picture_name($category_id, $picture_id, $name);
        if ($reponse) {
            return redirect()->back()->with('success', __('flash.img_name_change_succ'));
        }
        return redirect()->back()->with('error', __('flash.change_name_try_againe'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($category_id, $picture_id)
    {
        $reponse = (new PictureUser())->destroy_picture($category_id, $picture_id);
        if ($reponse) {
            return redirect()->back()->with('success', __('flash.img_del_succ'));
        }
        return redirect()->back()->with('error', __('flash.img_del_err'));

    }
}
