<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    // This model represents a banner that can be displayed on the website.
    protected $fillable = ['title', 'image', 'is_active'];

    /**
     * Get the URL of the banner image.
     *
     * @return string
     */
    public function getImageUrl()
    {
        return asset('storage/' . $this->image);
    }

}
