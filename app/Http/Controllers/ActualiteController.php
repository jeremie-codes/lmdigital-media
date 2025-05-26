<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actualite;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

class ActualiteController extends Controller
{

    public function index()
    {

        // $actualites = Actualite::all();
        // $region = Actualite::select('region')->distinct()->get();

        // dd($region);

        return view('news');
    }

    public function show($id)
    {

        // $user = Actualite::findOrFail($id);
        // return new UserResource($user);

        return view('index',);
    }

}
