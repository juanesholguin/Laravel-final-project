<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = ['name', 'description', 'priority'];

    public function books()
    {
        return $this->hasMany(Book::class);
    }
    /**
     * @return array
     */
    public function sluggable(): array {
        return [
            'slug' => [
                'source' => 'name'
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
