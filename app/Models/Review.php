<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Review extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'comic_id',
        'title',
        'content',
        'stars',
    ];

    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function comic(): HasOne
    {
        return $this->hasOne(Comic::class, 'id', 'comic_id');
    }
}
