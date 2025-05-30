<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actualite;
use App\Models\Article;
use App\Models\BreakingNews;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

class RubriqueController extends Controller
{

    public function index($id = null)
    {

        // $categoryId = Category::where('name', 'Politique')->value('id');
        $article = null;
        $articleOthers = Article::where('id', '!=', $id)
            ->where('rubrique', 'Politique')
            ->latest()
            ->where('type', 'video')
            ->paginate(10);

        if($id) {
            $article = Article::where('rubrique', 'Politique')
                ->where('type', 'video')
                ->where('id', $id)->first();
        }

        $breakingNews = BreakingNews::where('is_active', true)->latest()->get();

        return view('politiques', compact('article', 'articleOthers', 'breakingNews'));

    }

    public function sport($id = null)
    {

        // $categoryId = Category::where('name', 'sport')->value('id');
        $article = null;
        $articleOthers = Article::where('id', '!=', $id)
            ->where('rubrique', 'Sport')
            ->latest()
            ->where('type', 'video')
            ->paginate(10);

        if($id) {
            $article = Article::where('rubrique', 'Sport')
                ->where('type', 'video')
                ->where('id', $id)->first();
        }

        $breakingNews = BreakingNews::where('is_active', true)->latest()->get();
        return view('sports', compact('article', 'articleOthers', 'breakingNews'));

    }

    public function economie($id = null)
    {

        // $categoryId = Category::where('name', 'economie')->value('id');
        $article = null;
        $articleOthers = Article::where('id', '!=', $id)
            ->where('rubrique', 'Economie')
            ->latest()
            ->where('type', 'video')
            ->paginate(10);

        if($id) {
            $article = Article::where('rubrique', 'Economie')
                ->where('type', 'video')
                ->where('id', $id)->first();
        }

        $breakingNews = BreakingNews::where('is_active', true)->latest()->get();
        return view('economies', compact('article', 'articleOthers', 'breakingNews'));

    }

}
