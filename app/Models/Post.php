<?php

namespace App\Models;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{   
    protected $fillable = ['judul', 'user_id', 'content'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

