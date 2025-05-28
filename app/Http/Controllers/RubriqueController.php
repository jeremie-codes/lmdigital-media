<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actualite;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

class RubriqueController extends Controller
{

    public function index($id = null)
    {

        $categoryId = Category::where('name', 'politique')->value('id');
        $article = null;
        $articleOthers = Article::where('id', '!=', $id)
            ->where('category_id', $categoryId)
            ->where('type', 'video')
            ->paginate(10);

        if($id) {
            $article = Article::where('category_id', $categoryId)
                ->where('type', 'video')
                ->where('id', $id)->first();
        }

        return view('politiques', compact('article', 'articleOthers'));

    }

    public function sport($id = null)
    {

        $categoryId = Category::where('name', 'sport')->value('id');
        $article = null;
        $articleOthers = Article::where('id', '!=', $id)
            ->where('category_id', $categoryId)
            ->where('type', 'video')
            ->paginate(10);

        if($id) {
            $article = Article::where('category_id', $categoryId)
                ->where('type', 'video')
                ->where('id', $id)->first();
        }

        return view('sports', compact('article', 'articleOthers'));

    }

    public function economie($id = null)
    {

        $categoryId = Category::where('name', 'economie')->value('id');
        $article = null;
        $articleOthers = Article::where('id', '!=', $id)
            ->where('category_id', $categoryId)
            ->where('type', 'video')
            ->paginate(10);

        if($id) {
            $article = Article::where('category_id', $categoryId)
                ->where('type', 'video')
                ->where('id', $id)->first();
        }

        return view('economies', compact('article', 'articleOthers'));

    }

}
