<?php

namespace App\Models;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    function blog()
    {
        return $this->hasMany(Blog::class, 'category_id', 'id');
    }

    public function getBlogCountAttribute()
    {
        return $this->blog()->where('status', STATUS_MSG[0])->count();
    }

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::deleting(function ($category) {
    //         $category->blog()->delete();
    //     });
    // }
}
