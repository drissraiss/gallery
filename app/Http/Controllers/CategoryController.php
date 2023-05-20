<?php

namespace App\Http\Controllers;

use App\Models\CategoryUser;
use App\Models\PictureUser;
use App\Rules\NameCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class CategoryController extends Controller
{
    public function add(Request $request)
    {
        $request->validate([
            'category_name_add' => ['required', 'alphanum',  'min:2', 'max:12', new NameCategory()]
        ]);
        $category_name = request()->category_name_add;
        $user_id = session('id');
        CategoryUser::create(['name' => $category_name, 'user_id' => $user_id]);
        return redirect()->route('category', [$category_name])->with('success', __('flash.cat_create_succ'));;
    }
    public function update(Request $request)
    {
        $request->validate([
            'category_name' => ['required', 'alphanum',  'min:2', 'max:12', new NameCategory()]
        ]);
        $category_name = $request->category_name;
        $category_id = $request->category_id;
        $user_id = session('id');
        CategoryUser::where('id', $category_id)
            ->where('user_id', $user_id)
            ->update(['name' => $category_name, 'user_id' => $user_id]);
        return redirect()->back()->withInput()->with('success', __('flash.cat_name_change_succ'));
    }
    public function delete(Request $request)
    {
        $category_id = $request->category_delete;
        $user_id = session('id');
        CategoryUser::where('id', $category_id)->where('user_id', $user_id)->delete();
        return redirect()->back()->with('success', __('flash.cat_del_succ'));
    }
    public function show_category($category)
    {
        $dir = App::getLocale() == "ar" ? "rtl" : "ltr";
        $username = session('username');
        $categories = CategoryUser::all()->where('user_id', session('id'));
        $categories_with_count = (new CategoryUser())->get_categories_with_count(session('id'));
        $category_id = CategoryUser::where('name', $category)->where('user_id', session('id'))->get('id')->first();

        if (is_null($category_id)) {
            return redirect()->back()->with('error', __('flash.cat_not_exist'));
        }
        $search_query = request()->search_query ?? '';
        $category_pictures = PictureUser::where('category_id', $category_id->id)->where('name', 'like', "%$search_query%")->orderBy('created_at', 'desc')->paginate(8);
        $category_selected_id = $category_id->id;
        $category_selected_name = $category;

        return view('category', compact("dir", 'username', 'categories', 'categories_with_count', 'category_pictures', 'category_selected_id', 'category_selected_name', 'search_query'));
    }
}
