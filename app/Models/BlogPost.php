<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogPost extends Model
{
    use SoftDeletes;

    public function category()
    {
        //Статься пренадлежит категории
        return $this->belongsTo('App\Models\BlogCategory');
    }

    public function user()
    {
        // Статья пренадлежит пользователю
        return $this->belongsTo(User::class);
    }
    protected $fillable
    =[
        'title',
        'slug',
        'parent_id',
        'description',
        'category_id',
        'user_id',
        'content_raw',
        'excerpt',
        'content_html',
        'is_published',
        'published_at'

    ];

}
