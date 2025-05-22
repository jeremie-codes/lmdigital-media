<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rubrique;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

class RubriqueController extends Controller
{
    
    public function index()
    {

        $rubriques = Rubrique::all();
        $categorie = Rubrique::select('categorie')->distinct()->get();
        
        // dd($region);

        return view('rubriques', compact('rubriques', 'categorie'));
    }
    
    public function show($id)
    {

        $user = Rubrique::findOrFail($id);
        return new UserResource($user);

        return view('index', compact('actualites', 'opignons', 'rubriques'));
    }

}