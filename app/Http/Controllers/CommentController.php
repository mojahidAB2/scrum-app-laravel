<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Task;
use App\Models\UserStory;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request, $type, $id)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $commentable = match($type) {
            'task' => Task::findOrFail($id),
            'userstory' => UserStory::findOrFail($id),
            default => abort(404),
        };

        $commentable->comments()->create([
            'content' => $request->content,
            'user_id' => auth()->id(),
        ]);

        return back()->with('success', '✅ Commentaire ajouté avec succès.');
    }
}
