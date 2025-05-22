<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actualite;
use App\Models\OpinionEtDecouverte;
use App\Models\Rubrique;
use App\Models\Annonce;
use App\Models\Commentaire;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

class ArticleController extends Controller
{
    
    public function index()
    {

        $newsimage = Actualite::where('image', '!=', '')->get();
        $newsvideo = Actualite::where('video', '!=', '')->get();
        $opignons = OpinionEtDecouverte::all()->groupBy('categorie');
        $rubriques = Rubrique::all()->groupBy('categorie');
        $act = Actualite::all();
        $annonces = Annonce::all();
        
        // dd($newsvideo);

        return view('index', compact('newsimage', 'newsvideo', 'opignons', 'rubriques', 'annonces'));
    }
    
    public function show($id)
    {

        $article = Actualite::with('commentaires')->findOrFail($id);
        
        return view('shownews', compact('article'));
    }
    
    public function store(Request $request, $actualiteId)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'commentaire' => 'required|string|max:500',
        ]);

        $actualite = Actualite::findOrFail($actualiteId);

        // Ajouter un commentaire à l'actualité
        $actualite->commentaires()->create([
            'nom' => $request->input('nom'),
            'email' => $request->input('email'),
            'commentaire' => $request->input('commentaire'),
        ]);

        return redirect()->route('actualites.show', $actualiteId)->with('success', 'Commentaire ajouté avec succès.');
    }

}