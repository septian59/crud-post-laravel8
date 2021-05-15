<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'body', 'category_id', 'thumbnail'];

    protected $with = ['author', 'category', 'tags'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function takeImage()
    {
        return "storage/" . $this->thumbnail;
    }

    public function tags()
    {
        return $this->BelongsToMany(Tag::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
