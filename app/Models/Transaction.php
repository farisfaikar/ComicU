<?php

namespace App\Models;

use App\Models\User;
use App\Models\Comic;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'comic_id',
        
    ];

    public $timestamps = true;
    
    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function comic(): HasOne
    {
        return $this->hasOne(Comic::class, 'id', 'comic_id');
    }
}
