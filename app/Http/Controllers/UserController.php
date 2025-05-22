<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Models\User;

class UserController extends Controller
{
    
    public function index()
    {
        // $users = User::all(); // Récupère tous les utilisateurs
        $users = User::where('role', 'percepteur')->get(); // Récupère tous les utilisateurs qui ont comme role percepteur
        return UserResource::collection($users); // Retourne la collection formatée
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return new UserResource($user);
    }
    
        public function sync(Request $request)
    {
        $user = User::where('email', $request->email)->first();
    
        if ($user) {
            // Authentification réussie
            return response()->json([
                'status' => 'success',
                'user' => $user,
            ], 200);
        } else {
            // Authentification échouée
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid credentials',
            ], 401);
        }
    }
    
}