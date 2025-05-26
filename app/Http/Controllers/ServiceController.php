<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

class ServiceController extends Controller
{

    public function index()
    {

        // $services = Service::all();

        return view('services');
    }

}
