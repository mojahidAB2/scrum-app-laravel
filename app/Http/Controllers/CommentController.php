<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        // ✅ validation
        $request->validate([
            'user_story_id' => 'required|exists:user_stories,id',
            'contenu' => 'required|string|max:1000',
        ]);

        // ✅ إنشاء commentaire
        Comment::create([
            'user_story_id' => $request->user_story_id,
            'contenu' => $request->contenu,
            'user_id' => auth()->id(), // userID de l'utilisateur connecté
        ]);

        return back()->with('success', 'Commentaire ajouté avec succès.');
    }
}
