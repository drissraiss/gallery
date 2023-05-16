<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class PictureUser extends Model
{
    public $table = 'pictures';
    public $fillable = ['name', 'path', 'category_id', 'created_at'];
    public $hidden = ['updated_at'];

    public function destroy_picture($category_id, $picture_id)
    {
        $picture = PictureUser::find($picture_id);
        //return $picture->category_id == 33;
        if($picture->category_id == $category_id){
            $picture->delete();
            return 1;
        }
        return 0;
    }
    public function update_picture_name($category_id, $picture_id, $name){
        $picture = PictureUser::find($picture_id);
        if($picture->category_id == $category_id){
            $picture->update(['name' => $name]);
            return 1;
        }
        return 0;
    }
}
