<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OpinionEtDecouverte;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

class OpinionDecouverteController extends Controller
{

    public function index()
    {

        // $opinionDecouvertes = OpinionEtDecouverte::all();
        // $categorie = OpinionEtDecouverte::select('categorie')->distinct()->get();

        return view('politiques');
    }

    public function sport()
    {

        // $opinionDecouvertes = OpinionEtDecouverte::all();
        // $categorie = OpinionEtDecouverte::select('categorie')->distinct()->get();

        return view('sports');
    }

    public function economie()
    {

        // $opinionDecouvertes = OpinionEtDecouverte::all();
        // $categorie = OpinionEtDecouverte::select('categorie')->distinct()->get();

        return view('economies');
    }

}
