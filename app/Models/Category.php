<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

//    protected  $table = 'categories'; // tùy chỉnh tên bảng trong csdl
//// định nghĩa relationship
    protected $table = "categories";
    protected $fillable = ['name', 'slug', 'image', 'parent_id', 'position', 'is_active', 'type', 'user_id'];

    public function parent()
    {
        return $this->belongsTo( Category::class,'parent_id');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
//    // relationship one to many
    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }

    public function categoryChildrent()
    {
        return $this->hasMany(Category::class,'parent_id');
    }
}
