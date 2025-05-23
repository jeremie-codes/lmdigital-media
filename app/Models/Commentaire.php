<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'email',
        'nom',
        'actualite_id',
        'commentaire',
    ];
    
    // Relation avec Actualite
    public function actualite()
    {
        return $this->belongsTo(Actualite::class);
    }
}
