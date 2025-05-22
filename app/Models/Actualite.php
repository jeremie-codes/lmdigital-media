<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actualite extends Model
{
    use HasFactory;

    protected $fillable = [
        'region',
        'titre',
        'sous_titre',
        'contenu',
        'video',
        'image',
    ];
    
    // Relation avec Commentaire
    public function commentaires()
    {
        return $this->hasMany(Commentaire::class);
    }
}
