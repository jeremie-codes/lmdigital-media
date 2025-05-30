<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Like;
use App\Models\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
   public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:newsletters,email',
        ]);

        if (Newsletter::where('email', $request->input('email'))->exists()) {
            return redirect()->back()->with('newsletter_error', 'cette adresse email est déjà abonnée.');
        }
        // Enregistrer l'email dans la table newsletters
        $email = $request->input('email');
        $newsletter = new Newsletter();
        $newsletter->email = $email;
        $newsletter->save();

        return redirect()->back()->with('newsletter_success', 'Vous êtes maintenant abonné à notre newsletter !');
    }


}
