<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public $timestamps = false;
    
    protected $fillable = ['name'];

    public function blogs()
    {
        return $this->hasMany(Blog::class, 'author_id', 'id');
    }
    
}
