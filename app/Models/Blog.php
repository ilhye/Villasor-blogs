<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use SoftDeletes;
    public $timestamps = false;

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function status()
    {
        return $this->hasOne(Category::class, 'id', 'status_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tags::class);
    }

    public function comments () {
        return $this->hasMany(Comment::class, 'blog_id', 'id');
    }

    public function like () {
        return $this->hasOne(Like::class, 'blog_id', 'id');
    }
}
