<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Task;
use App\Models\UserStory;

class CommentController extends Controller
{
    public function store(Request $request, $type, $id)
    {
        $request->validate([
            'content' => 'required|string'
        ]);

        if ($type === 'task') {
            $commentable = Task::findOrFail($id);
        } elseif ($type === 'userstory') {
            $commentable = UserStory::findOrFail($id);
        } else {
            abort(404);
        }

        $commentable->comments()->create([
            'content' => $request->content,
            'user_id' => auth()->id(),
        ]);

        return back()->with('success', 'Commentaire ajouté.');
    }
}

