<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Comic extends Model
{
    use HasFactory;
    protected $fillable = [
        'comic_name',
        'price',
        'synopsis',
        'author',
        'comic_photo',
        'stock',
        'category_id',
    ];

    public function category(): HasOne
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
    public function review(): HasMany
    {
        return $this->hasMany(Review::class, 'id', 'review_id');
    }
    
    
}
