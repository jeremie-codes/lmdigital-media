<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'content',
        'status',
        'scheduled_at',
        'sent_at',
        'recipients_count',
        'opens_count',
        'clicks_count',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'scheduled_at' => 'datetime',
        'sent_at' => 'datetime',
        'recipients_count' => 'integer',
        'opens_count' => 'integer',
        'clicks_count' => 'integer',
    ];

    /**
     * Scope a query to only include draft newsletters.
     */
    public function scopeDraft($query)
    {
        return $query->where('status', 'draft');
    }

    /**
     * Scope a query to only include scheduled newsletters.
     */
    public function scopeScheduled($query)
    {
        return $query->where('status', 'scheduled')
            ->whereNotNull('scheduled_at');
    }

    /**
     * Scope a query to only include sent newsletters.
     */
    public function scopeSent($query)
    {
        return $query->where('status', 'sent');
    }
}