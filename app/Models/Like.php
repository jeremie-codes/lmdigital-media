<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $fillable = ['article_id', 'is_like', 'ip_address'];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }

}
