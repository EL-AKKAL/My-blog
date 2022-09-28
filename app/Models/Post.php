<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
                            'title',
                            'subtitle',
                            'slug',
                            'body',
                            'image',
                            'status',
                            'like',
                            'dislike',
                        ];

        public function tags()
        {
            return $this->belongsToMany(Tag::class,'post_tags')->withTimestamps();
        }
        public function categories()
        {
            return $this->belongsToMany(Category::class,'category_posts')->withTimestamps();
        }
        public function getRouteKeyName()
        {
            return 'slug';
        }
}
