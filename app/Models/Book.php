<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'author', 'price', 'cover_image', 'published_at', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}