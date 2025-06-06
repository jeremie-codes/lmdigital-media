<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Mail\NewArticleNotification;
use Illuminate\Support\Facades\Mail;

class Article extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
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
        'rubrique',
    ];

     public static function boot() {
        parent::boot();

        // Automatically set the author_id to the authenticated user
        static::creating(function ($model) {
            $model->type = 'video';
        });
    }

     public static function booted() {
        // parent::booted();

        // Automatically set the author_id to the authenticated user
        static::created(function ($model) {

                    // Récupérer tous les abonnés à la newsletter
            $subscribers = Newsletter::pluck('email');

            // Envoyer un mail à chacun
            foreach ($subscribers as $email) {
                Mail::to($email)->queue(new NewArticleNotification($model));
            }

        });
    }

    /**
     * Get the author of the article.
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    /**
     * Get the category of the article.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    // Relation avec Commentaire
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    public function likesCount()
    {
        return $this->likes()->where('is_like', true)->count();
    }

    public function dislikesCount()
    {
        return $this->likes()->where('is_like', false)->count();
    }



}
