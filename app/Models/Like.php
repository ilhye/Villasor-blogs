<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public $timestamps = false;
    protected $fillable = ['blog_id', 'likes'];

    public function blog () {
        return $this->belongsTo(Blog::class, 'id', 'blog_id');
    }
}
