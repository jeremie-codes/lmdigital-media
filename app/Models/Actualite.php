<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actualite extends Model
{
    use HasFactory;

    protected $table = 'articles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'slug',
        'content',
        'category_id',
        'author_id',
        'status',
        'is_published',
        'scheduled_at',
        'views_count',
        'youtube_url',
        'file_path',
        'cover_image',
    ];

    public static function boot() {
        parent::boot();

        // Automatically set the author_id to the authenticated user
        static::creating(function ($model) {
            $model->type = 'news';
        });
    }

    /**
     * Get the author of the article.
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    /**
     * Get the category of the article.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relation avec Commentaire
    public function comments()
    {
        return $this->hasMany(Comment::class, 'article_id');
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

}
