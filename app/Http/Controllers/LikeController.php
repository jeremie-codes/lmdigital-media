<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
   public function toggle(Request $request, $articleId)
    {
        $request->validate(['is_like' => 'required|boolean']);

        $ip = $request->ip();

        Like::updateOrCreate(
            ['article_id' => $articleId, 'ip_address' => $ip],
            ['is_like' => $request->is_like]
        );

        $article = Article::find($articleId);

        return response()->json([
            'likes' => $article->likes()->where('is_like', true)->count(),
            'dislikes' => $article->likes()->where('is_like', false)->count(),
        ]);
    }


}
