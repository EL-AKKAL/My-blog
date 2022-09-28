<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
                            'name',
                            'slug',
                        ];

    public function posts()
    {
        return $this->belongsToMany(Post::class,'post_tags')->orderByPivot('created_at','desc')->paginate(6);
    }
    public function getRouteKeyName()
        {
            return 'slug';
        }
}
