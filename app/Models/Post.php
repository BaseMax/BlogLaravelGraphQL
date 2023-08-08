<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ["title", "content", "author", "likes", "category", "views", "isPublished"];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, "author");
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, "category");
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, "comment");
    }
}
