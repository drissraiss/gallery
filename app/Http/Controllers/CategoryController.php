<?php

namespace App\Http\Controllers;

use App\Models\CategoryUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class CategoryController extends Controller
{
    public function add(Request $request)
    {
        $request->validate([
            'category_name_add' => ['required', 'alphanum',  'min:2', 'max:12', 'unique:categories,name']
        ]);
        $category_name = request()->category_name_add;
        $user_id = session('id');
        CategoryUser::create(['name' => $category_name, 'user_id' => $user_id]);
        return redirect()->back()->with('success', 'Category created successfully');;
    }
    public function update(Request $request)
    {
        $request->validate([
            'category_name' => ['required', 'alphanum',  'min:2', 'max:12', 'unique:categories,name']
        ]);
        $category_name = $request->category_name;
        $category_id = $request->category_id;
        $user_id = session('id');
        CategoryUser::where('id', $category_id)
            ->where('user_id', $user_id)
            ->update(['name' => $category_name, 'user_id' => $user_id]);
        return redirect()->back()->withInput()->with('success', 'Category name changed successfully');
    }
    public function delete(Request $request)
    {
        $category_id = $request->category_delete;
        $user_id = session('id');
        CategoryUser::where('id', $category_id)->where('user_id', $user_id)->delete();
        return redirect()->back()->with('success', 'The category has been deleted successfully');
    }
    public function show_category($category){
        $dir = App::getLocale() == "ar" ? "rtl" : "ltr";
        $username = session('username');
        $categories = CategoryUser::all()->where('user_id', session('id'));
        $categories_with_count = (new CategoryUser())->get_categories_with_count();
    
        return view('category', compact("dir", 'username', 'categories', 'categories_with_count'));
    }
}
