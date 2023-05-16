<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class CategoryUser extends Model
{
    public $table = 'categories';
    public $fillable = ['name', 'user_id'];
    public $hidden = ['created_at', 'updated_at'];

    public function get_categories_with_count()
    {
        return $this::leftJoin('pictures', 'categories.id', '=', 'pictures.category_id')
            ->select('categories.name as category', DB::raw('COUNT(pictures.id) as count'))
            ->groupBy('categories.name')
            ->get();
    }
}
