<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Book extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = ['title', 'author', 'price', 'cover_image', 'published_at', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return array
     */
    public function sluggable(): array {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    /**
     * @return string
     */
    public function getRouteKeyName(): string {
        return 'slug';
    }
}
