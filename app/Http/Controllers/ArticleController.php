<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actualite;
use App\Models\OpinionEtDecouverte;
use App\Models\Rubrique;
use App\Models\Annonce;
use App\Models\Article;
use App\Models\Banner;
use App\Models\BreakingNews;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Commentaire;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Config;

class ArticleController extends Controller
{

    public function index()
    {
        $lastvideos = Article::where('type', 'video')->with('comments')->latest()->limit(6)->get();
        $lastnews = Article::where('type', 'news')->latest()->limit(2)->get();
        $sidenews = Article::where('type', 'news')->orderBy('created_at', 'asc')->limit(2)->get();
        $annonces = Annonce::all();
        $footerCategories = Category::all();
        $configs = Config::all();
        $banners = Banner::where('is_active', true)->latest()->get();
        $breakingNews = BreakingNews::where('is_active', true)->latest()->get();

        return view('home', compact('lastnews', 'lastvideos', 'footerCategories', 'annonces', 'configs', 'sidenews', 'banners', 'breakingNews'));
    }

    public function news($cat = null)
    {

        $news = Article::where('type', 'news')->get();
        $categories = Category::all();

        if($cat) {
            $catId = Category::where('name', $cat)->value('id');
            $categories = Category::where('name', '!=', $cat)->get();
            $news = Article::where('type', 'news')->where('category_id', $catId)->get();
        }

        $breakingNews = BreakingNews::where('is_active', true)->latest()->get();

        return view('news', compact('news', 'categories', 'breakingNews'));
    }

    public function show($id)
    {

        $article = Actualite::with('comments')->findOrFail($id);
        $breakingNews = BreakingNews::where('is_active', true)->latest()->get();

        return view('shownews', compact('article', 'breakingNews'));
    }


    public function store(Request $request, $actualiteId)
    {
        $request->validate([
            'guest_name' => 'required|string|max:255',
            'guest_email' => 'required|email|max:255',
            'content' => 'required|string|max:500',
        ]);

        $actualite = Actualite::findOrFail($actualiteId);

        // Ajouter un commentaire à l'actualité
        $actualite->comments()->create([
            'nom' => $request->input('nom'),
            'email' => $request->input('email'),
            'content' => $request->input('content'),
        ]);

        return redirect()->route('actualites.show', $actualiteId)->with('success', 'Commentaire ajouté avec succès.');
    }

}
