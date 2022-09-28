<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
                            'name',
                            'slug',
                        ];

                        
        public function posts()
        {
            return $this->belongsToMany(Post::class,'category_posts')->orderByPivot('created_at','desc')->paginate(6);
        }

        public function getRouteKeyName()
        {
            return 'slug';   
        }
}
