<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpinionEtDecouverte extends Model
{
    use HasFactory;

    protected $fillable = [
        'categorie',
        'titre',
        'sous_titre',
        'contenu',
        'video',
        'image',
    ];
}
