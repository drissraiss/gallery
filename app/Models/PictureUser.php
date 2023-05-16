<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PictureUser extends Model
{
    public $table = 'pictures';
    public $fillable = ['name', 'path', 'category_id'];
    public $hidden = ['created_at', 'updated_at'];

    
}
