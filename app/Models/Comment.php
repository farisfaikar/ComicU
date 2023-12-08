<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Relations\HasOne;

// app/Models/Comment.php
class Comment extends Model
{
    // ...

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function comic()
    {
        return $this->hasOne(Comic::class, 'id', 'comic_id');
    }
}

