<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class CategoryUser extends Model
{
    public $table = 'categories';
    public $fillable = ['name', 'user_id', 'id'];
    public $hidden = ['created_at', 'updated_at'];

    public function get_categories_with_count($user_id)
    {
        return $this::select('categories.id', 'categories.name as category', DB::raw('COUNT(pictures.id) as count'))
        ->leftJoin('pictures', 'categories.id', '=', 'pictures.category_id')
            ->where('categories.user_id', $user_id)
            ->groupBy('categories.name', 'categories.id')
            ->orderBy('categories.id')
            ->get();
    }
}
